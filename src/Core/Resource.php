<?php

namespace LTL\HubspotApi\Core;

use LTL\HubspotApi\Core\Container;
use LTL\HubspotApi\Interfaces\ResourceInterface;
use LTL\HubspotApi\Traits\MethodsListable;

abstract class Resource implements ResourceInterface
{
    use MethodsListable;
    
    protected string $resource;

    protected ?string $response;

    protected ?int $status;

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
        return json_decode($this->response, true);
    }
  
    /**
     * Return Json Response
     *
     * @return array|null
     */
    public function toJson(): ?string
    {
        return $this->response;
    }
  
    /**
     * Return Status Response
     *
     * @return array|null
     */
    public function status(): int
    {
        return $this->status;
    }
 
    /**
     * Return the Documentation
     *
     * @return string|null
     */
    public function documentation(): ?string
    {
        return $this->documentation;
    }
}
