<?php

namespace LTL\Hubspot\Core\BodyBuilder;

use ArrayAccess;
use LTL\Hubspot\Core\BodyBuilder\ActionsBuilder;

abstract class BaseBodyBuilder implements ArrayAccess
{
    protected array $data = [];

    protected string $actionsClass;

    protected ActionsBuilder $actionsBuilder;

    public function __construct()
    {
        $class = $this->actionsClass;
        $this->actionsBuilder = new $class($this);
    }

    public function __call($method, $arguments)
    {
        return $this->execute($method, $arguments);
    }

    public static function __callStatic($method, $arguments)
    {
        return call_user_func_array([(new static), $method], $arguments);
    }

    private function execute($method, $arguments): self
    {
        return $this->actionsBuilder->{$method}(...$arguments);
    }

    public function add(string $index, mixed $value): self
    {
        $this->data[$index] = $value;

        return $this;
    }

    public function get(): array
    {
        return $this->data;
    }

    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->data);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->data[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->data[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->data[$offset]);
    }
}
