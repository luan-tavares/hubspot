<?php

namespace LTL\Hubspot\Core\Resource\Traits;

trait ResourceCountable
{
    public function count(): int
    {
        return count($this->response);
    }

    public function empty(): bool
    {
        return ($this->count() === 0);
    }
}
