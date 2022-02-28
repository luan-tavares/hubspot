<?php

namespace LTL\Hubspot\Core\Resource;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use LTL\Hubspot\Containers\BuilderContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\HubspotApikey;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Core\Resource\Traits\ResourceArrayAccess;
use LTL\Hubspot\Core\Resource\Traits\ResourceCountable;
use LTL\Hubspot\Core\Resource\Traits\ResourceEnumerable;
use LTL\Hubspot\Core\Resource\Traits\ResourceIteratorAggregate;
use LTL\Hubspot\Core\Resource\Traits\ResourceJsonSerializable;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;
use TypeError;

abstract class Resource implements ResourceInterface, ArrayAccess, JsonSerializable, IteratorAggregate, Countable
{
    use PublicMethodsListable,
        ResourceIteratorAggregate,
        ResourceArrayAccess,
        ResourceCountable,
        ResourceEnumerable,
        ResourceJsonSerializable;

    protected ResponseInterface $response;
    
    protected string $resource;

    public function __call($name, $arguments)
    {
        try {
            return BuilderContainer::get($this)->{$name}(...$arguments);
        } catch (TypeError $exception) {
            throw new HubspotApiException($exception->getMessage(), static::class);
        }
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([(new static), $name], $arguments);
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


    /**
     * Return Array Response
     *
     * @return array|null
     */
    public function toArray(): array
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->toArray();
    }
  
    /**
     * Return Json Response
     *
     * @return string|null
     */
    public function toJson(): string|null
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->toJson();
    }
  
    /**
     * Return Status Response
     *
     * @return int
     */
    public function status(): int
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->getStatus();
    }

    /**
     * Return true if has response error
     *
     * @return boolean
     */
    public function error(): bool
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->hasErrors();
    }
 
    /**
     * Return the Documentation
     *
     * @return string|null
     */
    public function documentation(): string|null
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->getDocumentation();
    }

    /**
     * Return the Response Header
     *
     * @return array|null
     */
    public function headers(): array|null
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->getHeaders();
    }

    public static function setGlobalApikey(string $apikey): void
    {
        HubspotApikey::store($apikey);
    }
}
