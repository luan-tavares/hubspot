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
use LTL\Hubspot\Core\Request\Components\ResourceRequestComponent;
use LTL\Hubspot\Core\Request\RequestComponentsList;
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

    private ResourceRequestComponent $resourceRequest;

    /**Factory \LTL\Hubspot\Factories\RequestFactory */
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

        if (in_array($method, $this->resourceRequest->getMethods())) {
            return $this->resourceRequest->{$method}(...$arguments);
        }

        $className = removeFromAnonymousClassName($this->resource::class);

        throw new HubspotApiException("{$className}::{$method}() not exists");
    }

    public function connect(ActionSchemaInterface $actionSchema, array $arguments): CurlInterface
    {
        $requestArguments = new RequestArguments($actionSchema, $arguments);

        return RequestConnection::handle($this, $requestArguments);
    }

    public function destroyComponents(): void
    {
        foreach (RequestComponentsList::ALL as $property => $className) {
            unset($this->{$property});
        }
    }

    public function bootComponents(): void
    {
        foreach (RequestComponentsList::ALL as $property => $className) {
            $this->{$property}->boot();
        }
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
 
    public function addBody(RequestArguments $requestArguments): self
    {
        $requestBody = $requestArguments->requestBody();

        $this->body->addArrayAfter($requestBody);

        return $this;
    }

    public function addBaseHeader(RequestArguments $requestArguments): self
    {
        $headers = $requestArguments->baseHeader();

        $this->header->addArrayBefore($headers);

        return $this;
    }

    public function addHeadersBefore(array|null $headers): self
    {
        $this->header->addArrayBefore($headers);

        return $this;
    }

    public function addUri(RequestArguments $requestArguments): self
    {
        $this->uri->create($requestArguments);

        return $this;
    }

    public function addMethod(RequestArguments $requestArguments): self
    {
        $method = $requestArguments->method();

        $this->method->set($method);

        return $this;
    }

    public function removeApikey(): self
    {
        $this->query->delete('hapikey');

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

    public function getTooManyRequestsTries(): int|null
    {
        return $this->resourceRequest->value('requestTries');
    }

    public function hasExceptionIfRequestError(): bool
    {
        return $this->resourceRequest->value('exception');
    }
}
