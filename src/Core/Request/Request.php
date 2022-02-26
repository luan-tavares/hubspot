<?php
namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Interfaces\Request\BodyComponentInterface;
use LTL\Hubspot\Core\Interfaces\Request\CurlComponentInterface;
use LTL\Hubspot\Core\Interfaces\Request\HeaderComponentInterface;
use LTL\Hubspot\Core\Interfaces\Request\QueryComponentInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Request\UriComponentInterface;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;

class Request implements RequestInterface
{
    private bool $hasDispatched = false;

    private QueryComponentInterface $query;

    private HeaderComponentInterface $header;

    private BodyComponentInterface $body;

    private CurlComponentInterface $curl;

    private UriComponentInterface $uri;

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

        throw new HubspotApiException($this->resource::class ."::{$method}() not exists");
    }

    public function changeDispatchToTrue(): void
    {
        $this->hasDispatched = true;
    }

    public function hasDispatched(): bool
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
        $this->query->addArray($queries);

        return $this;
    }
 
    public function addBody(array|null $body): self
    {
        $this->body->addArray($body);

        return $this;
    }

    public function addHeaders(array|null $headers): self
    {
        $this->header->addArray($headers);

        return $this;
    }

    public function addUri(string $baseUri, array $associativeParams, array $queries): self
    {
        $this->uri->generate($baseUri, $associativeParams, $queries);

        return $this;
    }
 
    /**Items for Curl Request */

    public function getQueries(): array
    {
        return $this->query->all();
    }

    public function getHeaders(): array
    {
        return $this->header->all();
    }

    public function getCurlParams(): array
    {
        return $this->curl->all();
    }

    public function getBody(): array
    {
        return $this->body->all();
    }

    public function getUri(): string
    {
        return $this->uri->get();
    }
}
