<?php

namespace LTL\Hubspot\Core\Resource\Traits;

trait ResourceJsonSerializable
{
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
