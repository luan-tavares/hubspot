<?php

namespace LTL\Hubspot\Services\ArrayObject;

use ArrayAccess;
use Countable;
use Iterator;
use LTL\Hubspot\Services\ArrayObject\Interfaces\AddArrayInterface;
use LTL\Hubspot\Services\ArrayObject\Interfaces\DeleteArrayInterface;
use LTL\Hubspot\Services\ArrayObject\Interfaces\GetArrayInterface;

class ArrayObjectService implements Iterator, Countable, ArrayAccess, AddArrayInterface, DeleteArrayInterface, GetArrayInterface
{
    public function __construct(private array $resource = [])
    {
    }

    public function all(): array
    {
        return $this->resource;
    }

    public function addArray(array $object): void
    {
        foreach ($object as $key => $value) {
            $this->resource[$key] = $value;
        }
    }

    public function delete(int|string $key): void
    {
        $this->offsetUnset($key);
    }

    public function empty(): void
    {
        $this->resource = [];
    }

    public function offsetSet($offset, $value): void
    {
        $this->resource[$offset] = $value;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->resource[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->resource[$offset]);
    }

    public function offsetGet($offset): mixed
    {
        return $this->resource[$offset];
    }

    public function count(): int
    {
        return count($this->resource);
    }

    public function rewind(): void
    {
        reset($this->resource);
    }
    
    public function current(): mixed
    {
        return current($this->resource);
    }
    
    public function key(): mixed
    {
        return key($this->resource);
    }
    
    public function next(): void
    {
        next($this->resource);
    }
    
    public function valid(): bool
    {
        return key($this->resource) !== null;
    }
}
