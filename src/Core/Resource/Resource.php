<?php

namespace LTL\Hubspot\Core\Resource;

use Error;
use LTL\Hubspot\Containers\BuilderContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Globals\GlobalComponents;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Resource\Traits\ResourceArrayAccess;
use LTL\Hubspot\Core\Resource\Traits\ResourceEnumerable;
use LTL\Hubspot\Core\Resource\Traits\ResourceIteratorAggregate;
use LTL\Hubspot\Core\Resource\Traits\ResourceResponse;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;
use TypeError;

abstract class Resource implements ResourceInterface
{
    use PublicMethodsListable,
        ResourceIteratorAggregate,
        ResourceArrayAccess,
        ResourceEnumerable,
        ResourceResponse;

    protected ResponseInterface $response;
    
    protected string $resource;

    protected int $version;

    public function __call($name, $arguments)
    {
        try {
            return BuilderContainer::get($this)->{$name}(...$arguments);
        } catch (Error $exception) {
            /** Call errors inside closures */
            throw new HubspotApiException($exception->getMessage());
        }
    }

    public static function __callStatic($name, $arguments)
    {
        $className = removeFromAnonymousClassName(static::class);
        
        if(in_array($name, GlobalComponents::getMethods())) {
            try {
                return GlobalComponents::{$name}(...$arguments);
            } catch (TypeError $exception) {
                throw new HubspotApiException($exception->getMessage(), $className);
            }
        }

        try {
            return call_user_func_array([(new static), $name], $arguments);
        } catch (Error $exception) {
            /**Call with Hubspot abstract class */

            throw new HubspotApiException($exception->getMessage());
        }
    }

    public function __toString()
    {
        return $this->resource;
    }

    public function __get($property)
    {
        $this->verifyIfResponseExists();

        return $this->response->{$property};
    }

    private function verifyIfResponseExists(string|null $method = null): void
    {
        if (isset($this->response)) {
            return;
        }

        $case = 'Property access';

        if (!is_null($method)) {
            $case = static::class ."::{$method}()";
        }

        throw new HubspotApiException(
            "{$case} must not be used before actions:\n\n". SchemaContainer::get($this)
        );
    }
}
