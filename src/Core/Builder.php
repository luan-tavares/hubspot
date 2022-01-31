<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Core\Container;
use LTL\Hubspot\Core\Exceptions\HubspotResourceException;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Request\Request;

class Builder
{
    private Request $request;

    public function __construct(private ResourceInterface $resource)
    {
        $this->request = new Request($this->resource);
    }

    public function __call($method, $arguments)
    {
        if (in_array($method, $this->resource->getMethods())) {
            return $this->makeAfterAction($method, $arguments);
        }

        $schema = Container::getSchema($this->resource);

        if (in_array($method, $schema->getMethods())) {
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
     * @throws HubspotResourceException
     */
    private function makeAfterAction(string $method, ?array $arguments): mixed
    {
        if (!$this->request->hasConnected()) {
            $schema = Container::getSchema($this->resource);

            $actions = $schema->mapKey(function ($action) {
                return "{$action}()";
            });

            throw new HubspotResourceException(
                "Can\'t use ". get_class($this->resource) .'::'. $method ."() before actions requests:\n[ ". implode(', ', $actions) .' ]'
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

        unset($this->request);

        $this->request = new Request($this->resource);

        return Container::setResponseToResource($this->resource, $response);
    }
}
