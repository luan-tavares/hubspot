<?php
namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Core\Response\Interfaces\ResponseDataInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;

class ResponseData implements ResponseDataInterface
{
    private object|array|null $result;

    private string $raw;

    private string|int|null $after;

    private function __construct()
    {
        /** LTL\Hubspot\Factories\ResponseDataFactory */
    }

    private function __clone()
    {
    }

    public function __isset($property): bool
    {
        if (!is_object($this->result)) {
            return false;
        }

        return property_exists($this->result, $property);
    }

    public function __get($property)
    {
        if (isset($this->{$property})) {
            return $this->result->{$property};
        }

        return null;
    }

    private function verifyIterable(): void
    {
        if (is_array($this->result)) {
            return;
        }

        $response = mb_strimwidth(json_encode($this), 0, 150, ' ...');

        throw new HubspotApiException(
            "Resource response is not iterable or countable:\n\n{$response}\n\n"
        );
    }

    public function toArray(): array
    {
        return json_decode($this->raw, true) ?? [];
    }

    public function getRaw(): string
    {
        return $this->raw;
    }

    public function getResult(): object|array|null
    {
        return $this->result;
    }

    public function getAfter(): string|int|null
    {
        return $this->after;
    }

    /**JsonSerializable */

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }

    /**Countable */

    public function count(): int
    {
        $this->verifyIterable();

        return count($this->result);
    }

    /**Iterable */

    public function rewind(): void
    {
        $this->verifyIterable();

        reset($this->result);
    }
    
    public function current(): object|int
    {
        return current($this->result);
    }
    
    public function key(): mixed
    {
        return key($this->result);
    }
    
    public function next(): void
    {
        next($this->result);
    }
    
    public function valid(): bool
    {
        return !is_null(key($this->result));
    }
}
