<?php
namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Container;
use LTL\Hubspot\Core\Request\Components\BodyRequestComponent;
use LTL\Hubspot\Core\Request\Components\CurlRequestComponent;
use LTL\Hubspot\Core\Request\Components\HeaderRequestComponent;
use LTL\Hubspot\Core\Request\Components\QueryRequestComponent;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Request\Observers\RequestObserver;
use LTL\Hubspot\Core\Request\RequestConstants;
use LTL\Hubspot\Core\Request\Services\MethodSchemaService;
use LTL\Hubspot\Core\Schema;
use LTL\Hubspot\Core\Exceptions\HubspotResourceException;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Services\Curl\Curl;
use ReflectionClass;
use ReflectionObject;

class Request
{
    private bool $hasConnected = false;

    private UriRequestComponent $uri;

    private QueryRequestComponent $query;

    private HeaderRequestComponent $header;

    private BodyRequestComponent $body;

    private CurlRequestComponent $curl;

    private ?string $action;

    public function __construct(private ResourceInterface $resource)
    {
        $this->init();
    }



    public function __call($method, $arguments)
    {
        if (in_array($method, $this->query->getMethods())) {
            return $this->query->{$method}(...$arguments);
        }

        if (in_array($method, $this->header->getMethods())) {
            return $this->header->{$method}(...$arguments);
        }

        if (in_array($method, $this->curl->getMethods())) {
            return $this->curl->{$method}(...$arguments);
        }

        throw new HubspotResourceException($this->resource::class ."::{$method}() not exists!", 1);
    }

    private function init()
    {
        $this->query = $this->instanceComponent(QueryRequestComponent::class);
        $this->query->addArray(['hapikey' => Container::apikey()]);

        $this->header = $this->instanceComponent(HeaderRequestComponent::class);
        $this->header->addArray(RequestConstants::DEFAULT_HEADER);

        $this->uri = $this->instanceComponent(UriRequestComponent::class);

        $this->body = $this->instanceComponent(BodyRequestComponent::class);

        $this->curl = $this->instanceComponent(CurlRequestComponent::class);
    }

    private function instanceComponent(string $class): RequestComponent
    {
        //$reflectionClass = new ReflectionClass($class);
  
        $component = new $class($this);

        $component->attach(container(RequestObserver::class));

        return $component;
    }

    public function dispatch(string $action, ?array $arguments): ResponseInterface
    {
        $schemaService = new MethodSchemaService($action, $arguments);
        
        $schemaService->resolveActionSchema($this->uri, $this->body);

        $schemaService->resolveContentType($this->header);

        $this->action = $action;
          
        $curl = new Curl($this);
        
        $this->hasConnected = true;

        return $curl->connect();
    }


    public function getResource(): ResourceInterface
    {
        return $this->resource;
    }

    public function getSchema(): Schema
    {
        return Container::getSchema($this->resource);
    }

    public function getActionSchema(string $method): array
    {
        return $this->getSchema()->getActionSchema($method);
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function removeHeader(string $header): void
    {
        $this->header->delete($header);
    }

    public function removeQuery(string $query): void
    {
        $this->query->delete($query);
    }

    public function hasConnected(): bool
    {
        return $this->hasConnected;
    }
 
    public function getUri(): string
    {
        return $this->uri->getUri();
    }

    public function getMethod(): string
    {
        return $this->uri->getMethod();
    }
 
    public function getQueries(): array
    {
        return $this->query->all();
    }

    public function getCurlParams(): array
    {
        return $this->curl->all();
    }

    public function getBody(): ?array
    {
        return $this->body->getBody();
    }

    public function getHeaders(): array
    {
        return $this->header->all();
    }

    public function getHeader(string $header): ?string
    {
        return @$this->getHeaders()[$header];
    }
}
