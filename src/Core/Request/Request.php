<?php
namespace LTL\Hubspot\Core\Request;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Interfaces\Request\BodyComponentInterface;
use LTL\Hubspot\Core\Interfaces\Request\CurlComponentInterface;
use LTL\Hubspot\Core\Interfaces\Request\HeaderComponentInterface;
use LTL\Hubspot\Core\Interfaces\Request\MethodComponentInterface;
use LTL\Hubspot\Core\Interfaces\Request\QueryComponentInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Request\UriComponentInterface;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;

class Request implements RequestInterface
{
    private QueryComponentInterface $query;

    private HeaderComponentInterface $header;

    private BodyComponentInterface $body;

    private MethodComponentInterface $method;

    private CurlComponentInterface $curl;

    private UriComponentInterface $uri;

    private ResourceInterface $resource;

    /**Factory \LTL\Hubspot\Factories\RequestFactory */
    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function destroyComponents(): void
    {
        unset($this->query, $this->header, $this->body, $this->curl, $this->uri, $this->method);
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

    public function connect(ActionSchemaInterface $actionSchema, array $arguments): CurlInterface
    {
        return (new RequestDefinition($this, $actionSchema, $arguments))->connect();
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

    public function addQueriesAfter(array|null $queries): self
    {
        $this->query->addArrayAfter($queries);

        return $this;
    }

    public function addQueriesBefore(array|null $queries): self
    {
        $this->query->addArrayBefore($queries);

        return $this;
    }
 
    public function addBody(ActionSchemaInterface $actionSchema, array $arguments): self
    {
        $this->body->create($actionSchema, $arguments);

        return $this;
    }

    public function addHeadersBefore(array|null $headers): self
    {
        $this->header->addArrayBefore($headers);

        return $this;
    }

    public function addUri(ActionSchemaInterface $actionSchema, array $arguments): self
    {
        $this->uri->create($actionSchema, $arguments);

        return $this;
    }

    public function addMethod(string $method): self
    {
        $this->method->set($method);

        return $this;
    }
 
    public function addApikeyWithoutObserver(string|null $apikey): self
    {
        $this->query->addNotNull('hapikey', $apikey);

        return $this;
    }

    public function removeApikey(): self
    {
        $this->query->delete('hapikey');

        return $this;
    }

    public function addOAuthWithoutObserver(string $oAuth): self
    {
        $this->header->addNotNull('Authorization', "Bearer {$oAuth}");

        return $this;
    }
    
    public function removeOAuth(): self
    {
        $this->header->delete('Authorization');

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

    public function getMethod(): string
    {
        return $this->method->get();
    }
}
