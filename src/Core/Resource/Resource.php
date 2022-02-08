<?php

namespace LTL\Hubspot\Core\Resource;

use LTL\Hubspot\Containers\BuilderContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Resource\Traits\ResourceArrayable;
use LTL\Hubspot\Core\Resource\Traits\ResourceCountable;
use LTL\Hubspot\Core\Resource\Traits\ResourceEnumerable;
use LTL\Hubspot\Core\Resource\Traits\ResourceIterable;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Services\PublicMethods\Traits\PublicMethodsListable;

abstract class Resource implements ResourceInterface
{
    use PublicMethodsListable, ResourceIterable, ResourceArrayable, ResourceCountable, ResourceEnumerable;

    protected ResponseInterface $response;
    
    protected string $resource;

    public function __call($name, $arguments)
    {
        return BuilderContainer::get($this)->{$name}(...$arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([(new static), $name], $arguments);
    }

    public function __destruct()
    {
        if (isset($this->response)) {
            $this->response->destroy();
        }
    }

    public function __toString()
    {
        return $this->resource;
    }

    public function __get($property)
    {
        if (isset($this->response)) {
            return $this->response->{$property};
        }

        $schema = SchemaContainer::get($this);

        $actions = $schema->mapWithActions(function ($action) {
            return "{$action}()";
        });

           
        throw new HubspotApiException(
            'Property access in "'. get_class($this) ."\" must not be used before actions:\n\n[". implode(', ', $actions) .']'
        );
    }


    /**
     * Return Array Response
     *
     * @return array|null
     */
    public function toArray(): array
    {
        return json_decode($this->response->get(), true) ?? [];
    }
  
    /**
     * Return Json Response
     *
     * @return array|null
     */
    public function toJson(): ?string
    {
        return $this->response->get();
    }
  
    /**
     * Return Status Response
     *
     * @return array|null
     */
    public function status(): int
    {
        return $this->response->getStatus();
    }

    /**
     * Return true if has response error
     *
     * @return boolean
     */
    public function error(): bool
    {
        return !($this->response->getStatus() >= 200 && $this->response->getStatus() <= 299);
    }
 
    /**
     * Return the Documentation
     *
     * @return string|null
     */
    public function documentation(): ?string
    {
        return $this->response->getDocumentation();
    }

    /**
     * Return the Response Header
     *
     * @return array|null
     */
    public function headers(): array|null
    {
        return $this->response->getHeaders();
    }
}
