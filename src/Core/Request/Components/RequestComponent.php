<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Observer\Interfaces\SubjectInterface;
use LTL\Observer\Traits\SubjectTrait;

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

        $this->items = array_filter(array_merge($this->items, $array), function ($item) {
            return !is_null($item);
        });

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
