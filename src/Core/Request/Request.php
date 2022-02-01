<?php
namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Container;
use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Request\Components\BodyRequestComponent;
use LTL\Hubspot\Core\Request\Components\CurlRequestComponent;
use LTL\Hubspot\Core\Request\Components\HeaderRequestComponent;
use LTL\Hubspot\Core\Request\Components\QueryRequestComponent;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\Observers\RequestObserver;
use LTL\Hubspot\Core\Request\Services\CurlRequestService;
use LTL\Hubspot\Core\Request\Services\MethodSchemaService;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Core\Schemas\ActionSchema;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ResourceSchemaInterface;

class Request implements RequestInterface
{
    private bool $hasConnected = false;

    public UriRequestComponent $uri;

    public QueryRequestComponent $query;

    public HeaderRequestComponent $header;

    public BodyRequestComponent $body;

    public CurlRequestComponent $curl;

    public function __construct(private ResourceInterface $resource)
    {
        $this->reset();
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

        throw new HubspotApiException($this->resource::class ."::{$method}() not exists!");
    }

    public function reset(): void
    {
        $this->query = $this->instanciateComponent(QueryRequestComponent::class);
       
        $this->header = $this->instanciateComponent(HeaderRequestComponent::class);

        $this->uri = $this->instanciateComponent(UriRequestComponent::class);

        $this->body = $this->instanciateComponent(BodyRequestComponent::class);

        $this->curl = $this->instanciateComponent(CurlRequestComponent::class);
    }

    private function instanciateComponent(string $class): RequestComponent
    {
        $component = new $class($this);
       
        $component->attach(container(RequestObserver::class));

        return $component;
    }

    public function dispatch(string $action, ?array $arguments = []): ResponseInterface
    {
        $actionSchema = $this->getActionSchema($action);

        $schemaService = new MethodSchemaService($actionSchema, $arguments);
        
        $schemaService->resolveActionSchema($this->uri, $this->body);
      

        $schemaService->resolveContentType($this->header);
       
        $curlRequest = new CurlRequestService($this);
 
        $curl = $curlRequest->connect();
        
        $this->hasConnected = true;
     
        return new Response($curl, $actionSchema);
    }


    public function getResource(): ResourceInterface
    {
        return $this->resource;
    }

    public function getSchema(): ResourceSchemaInterface
    {
        return Container::getSchema($this->resource);
    }

    public function getActionSchema(string $action): ActionSchemaInterface
    {
        return $this->getSchema()->getActionSchema($action);
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

    public function getBody(): ?array
    {
        return $this->body->getBody();
    }

    public function getHeaders(): array
    {
        return $this->header->all();
    }

    public function getCurlChanges(): array
    {
        return $this->curl->all();
    }
}
