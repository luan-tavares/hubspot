<?php

namespace LTL\Hubspot\Core\Resource\Traits;

trait ResourceIterable
{
    public function rewind(): void
    {
        $this->object->rewind();
    }
    
    public function current(): mixed
    {
        return $this->object->current();
    }
    
    public function key(): mixed
    {
        return $this->object->key();
    }
    
    public function next(): void
    {
        $this->object->next();
    }
    
    public function valid(): bool
    {
        return $this->object->valid();
    }

    public function each(callable $callback): void
    {
        foreach ($this as $value) {
            $callback($value);
        }
    }

    public function map(callable $callback): array
    {
        $result = [];
        foreach ($this as $value) {
            $result[] = $callback($value);
        }

        return $result;
    }

    public function filter(callable $callback): array
    {
        $result = [];
        foreach ($this as $value) {
            if ($callback($value)) {
                $result[] = $value;
            }
        }

        return $result;
    }
}
