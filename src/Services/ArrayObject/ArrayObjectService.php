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
    public function __construct(private array $items = [])
    {
    }

    public function all(): array
    {
        return $this->items;
    }

    public function addArray(array $object): void
    {
        foreach ($object as $key => $value) {
            $this->items[$key] = $value;
        }
    }

    public function delete(int|string $key): void
    {
        $this->offsetUnset($key);
    }

    public function empty(): void
    {
        $this->items = [];
    }

    public function offsetSet($offset, $value): void
    {
        $this->items[$offset] = $value;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->items[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->items[$offset]);
    }

    public function offsetGet($offset): mixed
    {
        return $this->items[$offset];
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function rewind(): void
    {
        reset($this->items);
    }
    
    public function current(): mixed
    {
        return current($this->items);
    }
    
    public function key(): mixed
    {
        return key($this->items);
    }
    
    public function next(): void
    {
        next($this->items);
    }
    
    public function valid(): bool
    {
        return key($this->items) !== null;
    }
}
