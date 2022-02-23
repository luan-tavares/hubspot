<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Request\RequestActionDefinition;
use LTL\Hubspot\Core\Request\RequestDispatcher;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
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
            $response = $this->makeResponse($method, $arguments);

            return ResourceFactory::build($this->resource, $response);
        }

        return $this->doBeforeRequest($method, $arguments);
    }

    public function __destruct()
    {
        RequestContainer::destroy($this->resource);
    }
 
    private function doBeforeRequest(string $method, ?array $arguments): Builder
    {
        $this->request->{$method}(...$arguments);

        return $this;
    }

    private function doAfterRequest(string $method, ?array $arguments): mixed
    {
        if ($this->request->hasDispatched()) {
            return $this->resource->{$method}(...$arguments);
        }

        $actions = SchemaContainer::get($this->resource)->mapWithActions(function ($action) {
            return "{$action}()";
        });

        throw new HubspotApiException(
            'Method "'. get_class($this->resource) ."::{$method}()\" must not be used before actions:\n\n[". implode(', ', $actions) .']'
        );
    }

    private function makeResponse(string $method, array $arguments): ResponseInterface
    {
        $actionSchema = SchemaContainer::getAction($this->resource, $method);

        $request = RequestContainer::get($this->resource);

        $curlService = RequestActionDefinition::finish($request, $actionSchema, $arguments);

        return new Response($curlService->connect(), SchemaContainer::getAction($this->resource, $method));
    }
}
