<?php
namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Containers\ObserverContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Request\Components\BodyRequestComponent;
use LTL\Hubspot\Core\Request\Components\CurlRequestComponent;
use LTL\Hubspot\Core\Request\Components\HeaderRequestComponent;
use LTL\Hubspot\Core\Request\Components\QueryRequestComponent;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\BodyComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\CurlComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\HeaderComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\QueryComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\Interfaces\UriComponentInterface;
use LTL\Hubspot\Core\Request\Observers\RequestObserver;
use LTL\Hubspot\Core\Request\Services\CurlRequestService;
use LTL\Hubspot\Core\Request\Services\FinishRequestDefinitionAction;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;

class Request implements RequestInterface
{
    private bool $hasConnected = false;

    private UriComponentInterface $uri;

    private QueryComponentInterface $query;

    private HeaderComponentInterface $header;

    private BodyComponentInterface $body;

    private CurlComponentInterface $curl;

    public function __construct(private ResourceInterface $resource)
    {
        $this->query = $this->instanciateComponent(QueryRequestComponent::class);
       
        $this->header = $this->instanciateComponent(HeaderRequestComponent::class);

        $this->uri = $this->instanciateComponent(UriRequestComponent::class);

        $this->body = $this->instanciateComponent(BodyRequestComponent::class);

        $this->curl = $this->instanciateComponent(CurlRequestComponent::class);
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

        throw new HubspotApiException('Method "'. $this->resource::class ."::{$method}()\" not exists");
    }

    private function instanciateComponent(string $class): RequestComponent
    {
        $component = new $class($this->resource);
       
        $component->attach(ObserverContainer::get(RequestObserver::class));

        return $component;
    }

    public function dispatch(string $action, ?array $arguments = []): ResponseInterface
    {
        $actionSchema = $this->getActionDefinition($action);
        
        (new FinishRequestDefinitionAction($this->resource, $actionSchema, $arguments))();
 
        $curl = (new CurlRequestService($this))->connect();
        
        $this->hasConnected = true;
     
        return new Response($curl, $actionSchema);
    }


    public function getActionDefinition(string $action): ActionSchemaInterface
    {
        return SchemaContainer::getAction($this->resource, $action);
    }

    public function hasConnected(): bool
    {
        return $this->hasConnected;
    }

    public function removeHeader(string $header): self
    {
        $this->header->delete($header);

        return $this;
    }

    public function removeQuery(string $query): self
    {
        $this->query->delete($query);

        return $this;
    }

    public function addQuery(?array $queries): self
    {
        $queries = $queries ?? [];

        foreach ($queries as $query => $value) {
            $this->query->query($query, $value);
        }

        return $this;
    }

    public function addBody(?array $body): self
    {
        $this->body->add($body);

        return $this;
    }

    public function addUri(string $uri): self
    {
        $this->uri->set($uri);

        return $this;
    }

    public function addMethod(string $method): self
    {
        $this->uri->setMethod($method);

        return $this;
    }

    public function addContentType(?string $contentType): self
    {
        $this->header->contentType($contentType);
 
        return $this;
    }

    public function addAccept(?string $accept): self
    {
        $this->header->accept($accept);
 
        return $this;
    }
 
    /**Items for Curl Request */
    public function getUri(): string
    {
        return $this->uri->get();
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
        return $this->body->get();
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
