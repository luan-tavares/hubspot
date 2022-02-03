<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Core\Container;
use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;

class Builder
{
    private RequestInterface $request;
    
    public function __construct(private ResourceInterface $resource)
    {
        $this->request = Container::getRequest($this->resource);
    }



    public function __call($method, $arguments)
    {
        if (in_array($method, $this->resource->getMethods())) {
            return $this->makeAfterAction($method, $arguments);
        }

        $schema = Container::getSchema($this->resource);

        if (in_array($method, $schema->getActions())) {
            return $this->makeRequestAction($method, $arguments);
        }

        return $this->buildRequestAction($method, $arguments);
    }
     
    /**
     * Make Build Request Action
     *
     * @param string $method
     * @param array|null $arguments
     * @return Builder
     */
    private function buildRequestAction(string $method, ?array $arguments): Builder
    {
        $this->request->{$method}(...$arguments);

        return $this;
    }

    /**
     * Make after Request Action
     *
     * @param string $method
     * @param array|null $arguments
     * @return mixed
     * @throws HubspotApiException
     */
    private function makeAfterAction(string $method, ?array $arguments): mixed
    {
        if (!$this->request->hasConnected()) {
            $schema = Container::getSchema($this->resource);

            $actions = $schema->mapWithActions(function ($action) {
                return "{$action}()";
            });

            throw new HubspotApiException(
                "Can't use ". get_class($this->resource) .'::'. $method ."() before actions requests:\n[". implode(', ', $actions) .']'
            );
        }

        return $this->resource->{$method}(...$arguments);
    }



    /**
     * Make Request and Reset Action
     *
     * @param string $method
     * @param array|null $arguments
     * @return ResourceInterface
     */
    private function makeRequestAction(string $method, ?array $arguments): ResourceInterface
    {
        $response = $this->request->dispatch($method, $arguments);

        return Container::setResponseToResource($this->resource, $response);
    }
}
