<?php
namespace LTL\Hubspot\Core\Request;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Request\Components\ResourceRequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\CurlComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\HeaderComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\QueryComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestArgumentsInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\RequestComponentsList;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;

class Request implements RequestInterface
{
    private QueryComponentInterface $query;

    private HeaderComponentInterface $header;

    private CurlComponentInterface $curl;

    private ResourceRequestComponent $resourceRequest;

    private ResourceInterface $resource;
    
    private function __construct()
    {
        /**Factory \LTL\Hubspot\Factories\RequestFactory */
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

    public function addUriArguments(RequestArgumentsInterface $requestArguments): self
    {
        $this->query->addArrayBefore($requestArguments->baseQuery());
        
        $this->query->addArrayBefore($requestArguments->queriesAsParams());
        
        return $this;
    }

    public function addBaseHeader(RequestArgumentsInterface $requestArguments): self
    {
        $this->header->addArrayBefore($requestArguments->baseHeader());
        
        return $this;
    }

    public function removeException(): self
    {
        $this->resourceRequest->notWithRequestException();

        return $this;
    }

    public function setRequestTries(int $tries): self
    {
        $maxTries = HubspotConfig::MAX_REQUESTS_TRIES;

        if($tries >= 1 && $tries <= $maxTries) {
            $this->resourceRequest->add('tries', $tries);

            return $this;
        }

        throw new HubspotApiException("Max too Many Request tries must be less {$maxTries} or more 1");
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

    public function getRequestsTries(): int
    {
        return $this->resourceRequest->value('tries');
    }

    public function hasWithRequestException(): bool
    {
        return $this->resourceRequest->value('exception');
    }
}
