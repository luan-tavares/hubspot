<?php

namespace LTL\Hubspot\Core\Resource\Traits;

use LTL\Hubspot\Exceptions\HubspotApiException;

trait ResourceArrayable
{
    public function offsetSet(mixed $offset, mixed $value): void
    {
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->toArray()[$offset]);
    }

    public function offsetUnset(mixed $offset):void
    {
    }

    public function offsetGet(mixed $offset): mixed
    {
        if (array_key_exists($offset, $this->toArray())) {
            return $this->toArray()[$offset];
        }

        $response = mb_strimwidth($this->toJson(), 0, 300, ' ...');

        throw new HubspotApiException("Undefined \"{$offset}\" offset in response array first level:\n\n{$response}\n\n");
    }
}
