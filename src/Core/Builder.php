<?php

namespace LTL\Hubspot\Core;

use LTL\Curl\Curl;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\BuilderInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Request\RequestDefinition;
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
            return $this->baseResource->{$method}(...$arguments);
        }

        if (in_array($method, SchemaContainer::get($this->baseResource)->getActions())) {
            return $this->makeCurlRequest($method, $arguments);
        }

        $this->request->{$method}(...$arguments);

        return $this;
    }

    public function __destruct()
    {
        $this->request->destroyComponents();
    }

    public function baseResource(): ResourceInterface
    {
        return $this->baseResource;
    }

    public function request(): RequestInterface
    {
        return $this->request;
    }

    private function makeCurlRequest(string $method, array $arguments): ResourceInterface
    {
        $actionSchema = SchemaContainer::getAction($this->baseResource, $method);

        $curl = $this->request->connect($actionSchema, $arguments);

        return ResourceFactory::build($this->baseResource, new Response($curl, $actionSchema));
    }
}
