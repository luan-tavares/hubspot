<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Core\Container;
use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\ResourceIterableInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Traits\MethodsListable;
use LTL\Hubspot\Core\Traits\ResourceIterable;

abstract class Resource implements ResourceInterface, ResourceIterableInterface
{
    use MethodsListable, ResourceIterable;

    private ?ResponseInterface $response = null;
    
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

 

    public function __get($property)
    {
        if (is_null($this->response)) {
            $schema = Container::getSchema($this);

            $actions = $schema->mapWithActions(function ($action) {
                return "{$action}()";
            });

            throw new HubspotApiException(
                "Can't use ". get_class($this) ."::{$property} before actions requests:\n[". implode(', ', $actions) .']'
            );
        }

        return $this->response->{$property};
    }


    /**
     * Return Array Response
     *
     * @return array|null
     */
    public function toArray(): ?array
    {
        return $this->response->getArray();
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
