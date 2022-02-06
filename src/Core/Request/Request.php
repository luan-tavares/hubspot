<?php
namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Request\Interfaces\BodyComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\CurlComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\HeaderComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\QueryComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\Services\MakeCurlServiceAction;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\Response;

class Request implements RequestInterface
{
    private bool $hasDispatched = false;

    private QueryComponentInterface $query;

    private HeaderComponentInterface $header;

    private BodyComponentInterface $body;

    private CurlComponentInterface $curl;

    private ResourceInterface $resource;

    private function __construct()
    {
    }

    private function __clone()
    {
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


    public function dispatch(string $action, array $arguments): ResponseInterface
    {
        $actionSchema = SchemaContainer::getAction($this->resource, $action);
        
        $curlService = MakeCurlServiceAction::execute($this->resource, $actionSchema, $arguments);
        
        $this->hasDispatched = true;
     
        return new Response($curlService->connect(), $actionSchema);
    }

    public function dispatched(): bool
    {
        return $this->hasDispatched;
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

    public function addQueries(array|null $queries): self
    {
        $queries = $queries ?? [];

        foreach ($queries as $query => $value) {
            $this->query->query($query, $value);
        }

        return $this;
    }

    public function addBody(array|null $body): self
    {
        $this->body->add($body);

        return $this;
    }

    public function addHeaders(array|null $headers): self
    {
        $headers = $headers ?? [];

        foreach ($headers as $header => $value) {
            $this->header->header($header, $value);
        }

        return $this;
    }
 
    /**Items for Curl Request */

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

    public function getCurlParams(): array
    {
        return $this->curl->all();
    }
}
