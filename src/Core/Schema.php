<?php

namespace LTL\HubspotApi\Core;

use ArrayAccess;
use Countable;
use Iterator;
use LTL\HubspotApi\Exceptions\HubspotResourceException;
use LTL\HubspotApi\Interfaces\MethodListInterface;
use LTL\HubspotApi\Interfaces\ResourceInterface;
use LTL\HubspotApi\Interfaces\SchemaInterface;

class Schema implements ArrayAccess, Countable, Iterator, SchemaInterface, MethodListInterface
{
    private array $schema;

    public function __construct(private ResourceInterface $resource)
    {
        $this->schema = json_decode(file_get_contents(__ROOT__.'/src/schemas/'. (string) $resource .'.json'), true);
    }

    public function getMethods(): array
    {
        return array_keys($this['methods']);
    }

    public function getMethodSchema(string $method): array
    {
        if (!array_key_exists($method, $this['methods'])) {
            throw new HubspotResourceException($this->resource::class ."::{$method}() not exists!", 1);
        }

        return $this['methods'][$method];
    }

    /**ArrayAccess */

    public function offsetSet($offset, $value): void
    {
    }

    public function offsetExists($offset): bool
    {
        return isset($this->schema[$offset]);
    }

    public function offsetUnset($offset): void
    {
    }

    public function offsetGet($offset): mixed
    {
        return $this->schema[$offset];
    }

    /***Countable */

    public function count(): int
    {
        return count($this->schema['methods']);
    }

    /**Iterator */

    public function rewind(): void
    {
        reset($this->schema['methods']);
    }
    
    public function current(): mixed
    {
        return current($this->schema['methods']);
    }
    
    public function key(): mixed
    {
        return key($this->schema['methods']);
    }
    
    public function next(): void
    {
        next($this->schema['methods']);
    }
    
    public function valid(): bool
    {
        return key($this->schema['methods']) !== null;
    }
}
