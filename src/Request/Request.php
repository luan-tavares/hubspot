<?php
namespace LTL\HubspotApi\Request;

use LTL\HubspotApi\Core\Container;
use LTL\HubspotApi\Core\Schema;
use LTL\HubspotApi\Exceptions\HubspotResourceException;
use LTL\HubspotApi\Interfaces\ResourceInterface;
use LTL\HubspotApi\Request\Components\BodyRequestComponent;
use LTL\HubspotApi\Request\Components\CurlRequestComponent;
use LTL\HubspotApi\Request\Components\HeaderRequestComponent;
use LTL\HubspotApi\Request\Components\QueryRequestComponent;
use LTL\HubspotApi\Request\Components\UriRequestComponent;
use LTL\HubspotApi\Request\Observers\BodyComponentObserver;
use LTL\HubspotApi\Request\Observers\HeaderComponentObserver;
use LTL\HubspotApi\Request\Observers\QueryComponentObserver;
use LTL\HubspotApi\Request\Observers\UriComponentObserver;
use LTL\HubspotApi\Request\RequestConstants;
use LTL\HubspotApi\Request\Services\MethodSchemaService;
use LTL\HubspotApi\Services\Curl\Curl;
use ReflectionObject;

class Request
{
    private bool $hasConnected = false;

    private UriRequestComponent $uri;

    private QueryRequestComponent $query;

    private HeaderRequestComponent $header;

    private BodyRequestComponent $body;

    private CurlRequestComponent $curl;

    private ?string $method;

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
        $this->query = new QueryRequestComponent($this);
        $this->query->addArray(['hapikey' => Container::apikey()]);
        $this->query->attach(container(QueryComponentObserver::class));

        $this->header = new HeaderRequestComponent($this);
        Container::$ob = $this->header;
        $this->header->addArray(RequestConstants::DEFAULT_HEADER);
        $this->header->attach(container(HeaderComponentObserver::class));

        $this->uri = new UriRequestComponent($this);
        $this->uri->attach(container(UriComponentObserver::class));

        $this->body = new BodyRequestComponent($this);
        $this->body->attach(container(BodyComponentObserver::class));

        $this->curl = new CurlRequestComponent($this);
    }

    public function dispatch(string $method, ?array $arguments): ResourceInterface
    {
        $schemaService = new MethodSchemaService($method, $arguments);
        
        $schemaService->resolveMethodSchema($this->uri, $this->body);

        $schemaService->resolveContentType($this->header);

        $this->method = $method;
          
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

    public function getMethodSchema(string $method): array
    {
        return $this->getSchema()->getMethodSchema($method);
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

    public function getAction(): string
    {
        return $this->uri->getAction();
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

    public function returnResolvedResource(string $response, int $status): ResourceInterface
    {
        $reflector = new ReflectionObject($this->resource);

        $property = $reflector->getProperty('response');
        $property->setValue($this->resource, ($response === '')?(null):($response));

        $property = $reflector->getProperty('status');
        $property->setValue($this->resource, $status);
        
        $property = $reflector->getProperty('uri');
        $property->setValue($this->resource, $this->getUri());

        $property = $reflector->getProperty('documentation');
        $property->setValue($this->resource, $this->getDocumentation());
              
        return $this->resource;
    }

    private function getDocumentation(): ?string
    {
        $schema = $this->getSchema();
        $documentation = @$schema->getMethodSchema($this->method)['documentation'];
        
        if (!is_null(@$documentation)) {
            return $documentation;
        }

        return @$schema['documentation'];
    }
}
