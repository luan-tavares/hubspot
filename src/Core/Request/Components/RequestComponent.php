<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Services\Observer\Interfaces\SubjectInterface;
use LTL\Hubspot\Services\Observer\Traits\SubjectTrait;

abstract class RequestComponent implements SubjectInterface
{
    use SubjectTrait;

    private array $items = [];

    public function __construct(private ResourceInterface $resource)
    {
    }

    public function getRequest(): RequestInterface
    {
        return RequestContainer::get($this->resource);
    }

    public function all(): array
    {
        return $this->items;
    }

    public function delete(int|string $key): void
    {
        unset($this->items[$key]);
    }

    public function addArray(array|null $array): self
    {
        if (is_null($array)) {
            return $this;
        }

        $this->items = array_merge($this->items, $array);

        return $this;
    }
  
    public function add(string $name, string|int|array|bool|null $value): self
    {
        if (is_null($value)) {
            return $this;
        }
        
        $this->items[$name] = $value;

        return $this;
    }
}
