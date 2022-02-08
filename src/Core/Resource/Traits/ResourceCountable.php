<?php

namespace LTL\Hubspot\Core\Resource\Traits;

trait ResourceCountable
{
    public function count(): int
    {
        return $this->response->count();
    }
}
