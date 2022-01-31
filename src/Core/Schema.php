<?php

namespace LTL\Hubspot\Core;

use ArrayAccess;
use Countable;
use Iterator;
use LTL\Hubspot\Core\Exceptions\HubspotResourceException;
use LTL\Hubspot\Core\Interfaces\MethodListInterface;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\SchemaInterface;

class Schema implements ArrayAccess, Countable, Iterator, SchemaInterface, MethodListInterface
{
    private array $schema;

    public function __construct(private ResourceInterface $resource)
    {
        $this->schema = json_decode(file_get_contents(__ROOT__.'/src/schemas/'. (string) $resource .'.json'), true);
    }

    public function getMethods(): array
    {
        return array_keys($this['actions']);
    }

    public function mapKey(callable $function): array
    {
        return array_map($function, $this->getMethods());
    }

    public function getActionSchema(string $method): array
    {
        if (!array_key_exists($method, $this['actions'])) {
            throw new HubspotResourceException($this->resource::class ."::{$method}() not exists!", 1);
        }

        return $this['actions'][$method];
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
        return count($this->schema['actions']);
    }

    /**Iterator */

    public function rewind(): void
    {
        reset($this->schema['actions']);
    }
    
    public function current(): mixed
    {
        return current($this->schema['actions']);
    }
    
    public function key(): mixed
    {
        return key($this->schema['actions']);
    }
    
    public function next(): void
    {
        next($this->schema['actions']);
    }
    
    public function valid(): bool
    {
        return key($this->schema['actions']) !== null;
    }
}
