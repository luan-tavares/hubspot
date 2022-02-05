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
            return $this->makeAfterAction($method, $arguments);
        }

        $schema = SchemaContainer::get($this->resource);

        if (in_array($method, $schema->getActions())) {
            return $this->makeRequestAction($method, $arguments);
        }

        return $this->buildRequestAction($method, $arguments);
    }

    public function __destruct()
    {
        RequestContainer::destroy($this->resource);
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
            $schema = SchemaContainer::get($this->resource);

            $actions = $schema->mapWithActions(function ($action) {
                return "{$action}()";
            });

            throw new HubspotApiException(
                'Method "'. get_class($this->resource) ."::{$method}()\" must not be used before actions:\n\n[". implode(', ', $actions) .']'
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



        return AddResponseToResourceAction::execute($this->resource, $response);
    }
}
