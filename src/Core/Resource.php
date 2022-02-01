<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Core\Container;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\ResourceIterableInterface;
use LTL\Hubspot\Core\Traits\MethodsListable;
use LTL\Hubspot\Core\Traits\ResourceIterable;

abstract class Resource implements ResourceInterface, ResourceIterableInterface
{
    use MethodsListable, ResourceIterable;
    
    protected string $resource;

    protected ?string $documentation;

    protected ?string $uri;

    public function __call($name, $arguments)
    {
        return Container::getBuilder($this)->{$name}(...$arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([(new static), $name], $arguments);
    }

    public function __toString()
    {
        return $this->resource;
    }


    /**
     * Return Array Response
     *
     * @return array|null
     */
    public function toArray(): ?array
    {
        return $this->response->toArray();
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
}
