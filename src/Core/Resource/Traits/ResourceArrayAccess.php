<?php

namespace LTL\Hubspot\Core\Resource\Traits;

use LTL\Hubspot\Exceptions\HubspotApiException;

trait ResourceArrayAccess
{
    public function offsetSet(mixed $offset, mixed $value): void
    {
        return;
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->toArray()[$offset]);
    }

    public function offsetUnset(mixed $offset):void
    {
        return;
    }

    public function offsetGet(mixed $offset): mixed
    {
        if (array_key_exists($offset, $this->toArray())) {
            return $this->toArray()[$offset];
        }

        $response = mb_strimwidth($this->toJson(), 0, 150, ' ...');

        throw new HubspotApiException("Undefined \"{$offset}\" offset in response array first level:\n\n{$response}\n\n");
    }
}
