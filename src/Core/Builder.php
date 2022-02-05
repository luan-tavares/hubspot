<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

class Builder
{
    private RequestInterface $request;
    
    public function __construct(private ResourceInterface $resource)
    {
        $this->request = RequestContainer::get($this->resource);
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


    private function doBeforeRequest(string $method, ?array $arguments): Builder
    {
        $this->request->{$method}(...$arguments);

        return $this;
    }

    private function doAfterRequest(string $method, ?array $arguments): mixed
    {
        if ($this->request->dispatched()) {
            return $this->resource->{$method}(...$arguments);
        }

        $actions = SchemaContainer::get($this->resource)->mapWithActions(function ($action) {
            return "{$action}()";
        });

        throw new HubspotApiException(
            'Method "'. get_class($this->resource) ."::{$method}()\" must not be used before actions:\n\n[". implode(', ', $actions) .']'
        );
    }

    private function doRequest(string $method, array $arguments): ResourceInterface
    {
        $response = $this->request->dispatch($method, $arguments);

        return AddResponseToResourceAction::execute($this->resource, $response);
    }
}
