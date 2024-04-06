<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\BuilderInterface;
use LTL\Hubspot\Core\Handlers\Handlers;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\RequestInfoObject;
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
        if (!isset($this->request)) {
            return;
        }
        
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

        $handler = $actionSchema->handler;
        
        if (!is_null($handler)) {
            return Handlers::call($this, $handler, $arguments);
        }
        
        $dto = new RequestInfoObject($this->request->getResponseRequest(), $this->baseResource);

        $curl = $this->request->connect($actionSchema, $arguments);

        return ResourceFactory::build($actionSchema, $curl, $dto);
    }
}
