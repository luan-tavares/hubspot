<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\BuilderInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Request\RequestActionDefinition;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ResourceFactory;

class Builder implements BuilderInterface
{
    private RequestInterface $request;

    private ResourceInterface $baseResource;
    
    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __call($method, $arguments)
    {
        if (in_array($method, $this->baseResource->getMethods())) {
            return $this->doAfterRequest($method, $arguments);
        }

        if (in_array($method, SchemaContainer::get($this->baseResource)->getActions())) {
            return $this->doRequest($method, $arguments);
        }

        return $this->doBeforeRequest($method, $arguments);
    }

    public function __destruct()
    {
        RequestContainer::destroy($this->baseResource);
    }

    public function resource(): ResourceInterface
    {
        return $this->baseResource;
    }

    private function doRequest(string $method, array $arguments): ResourceInterface
    {
        $actionSchema = SchemaContainer::getAction($this->baseResource, $method);

        $curlService = RequestActionDefinition::finish($this->request, $actionSchema, $arguments)->connect();

        $response =  new Response($curlService, $actionSchema);

        return ResourceFactory::build($this->baseResource, $response);
    }
 
    private function doBeforeRequest(string $method, array $arguments): BuilderInterface
    {
        $this->request->{$method}(...$arguments);

        return $this;
    }

    private function doAfterRequest(string $method, array $arguments): mixed
    {
        if ($this->request->hasDispatched()) {
            return $this->baseResource->{$method}(...$arguments);
        }

        $actions = SchemaContainer::get($this->baseResource)->mapWithActions(function ($action) {
            return "{$action}()";
        });

        throw new HubspotApiException(
            get_class($this->baseResource) ."::{$method}() must not be used before actions:\n\n[". implode(', ', $actions) .']'
        );
    }
}
