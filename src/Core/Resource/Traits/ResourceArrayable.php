<?php

namespace LTL\Hubspot\Core\Resource\Traits;

use LTL\Hubspot\Core\Exceptions\HubspotApiException;

trait ResourceArrayable
{
    public function offsetSet($offset, $value)
    {
    }

    public function offsetExists($offset)
    {
        return isset($this->toArray()[$offset]);
    }

    public function offsetUnset($offset)
    {
    }

    public function offsetGet($offset)
    {
        if (!array_key_exists($offset, $this->toArray())) {
            $response = mb_strimwidth($this->toJson(), 0, 300, ' ...');

            throw new HubspotApiException("Undefined \"{$offset}\" offset in response array first level:\n\n{$response}\n\n");
        }

        return $this->toArray()[$offset];
    }
}
