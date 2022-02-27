<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Request\RequestActionDefinition;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ResourceFactory;

class Builder
{
    private RequestInterface $request;

    private ResourceInterface $resource;
    
    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __call($method, $arguments)
    {
        if (in_array($method, $this->resource->getMethods())) {
            return $this->doAfterRequest($method, $arguments);
        }

        if (in_array($method, SchemaContainer::get($this->resource)->getActions())) {
            return $this->doRequest($method, $arguments);
        }

        return $this->doBeforeRequest($method, $arguments);
    }

    public function __destruct()
    {
        RequestContainer::destroy($this->resource);
    }

    private function doRequest(string $method, array $arguments): ResourceInterface
    {
        $actionSchema = SchemaContainer::getAction($this->resource, $method);

        $curlService = RequestActionDefinition::finish($this->request, $actionSchema, $arguments)->connect();

        $response =  new Response($curlService, $actionSchema);

        return ResourceFactory::build($this->resource, $response);
    }
 
    private function doBeforeRequest(string $method, array $arguments): Builder
    {
        $this->request->{$method}(...$arguments);

        return $this;
    }

    private function doAfterRequest(string $method, array $arguments): mixed
    {
        if ($this->request->hasDispatched()) {
            return $this->resource->{$method}(...$arguments);
        }

        $actions = SchemaContainer::get($this->resource)->mapWithActions(function ($action) {
            return "{$action}()";
        });

        throw new HubspotApiException(
            get_class($this->resource) ."::{$method}() must not be used before actions:\n\n[". implode(', ', $actions) .']'
        );
    }
}
