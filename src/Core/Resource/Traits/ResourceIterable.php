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
}
