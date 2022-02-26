<?php
namespace LTL\Hubspot\Core\Response;

use Countable;
use Iterator;
use JsonSerializable;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Interfaces\ArrayableInterface;
use LTL\Hubspot\Interfaces\JsonableInterface;

class ResponseObject implements Iterator, Countable, JsonSerializable, ArrayableInterface, JsonableInterface
{
    private object|null $object;

    private array $array;

    private array|null $iteratorObject = null;

    public function __construct(private ResponseInterface $response)
    {
        $this->object = json_decode($this->response->toJson());

        $this->array = json_decode($this->response->toJson(), true) ?? [];

        if (is_null(@$this->object->{@$this->response->index})) {
            return;
        }

        $this->iteratorObject = (array) @$this->object->{@$this->response->index};
    }

    public function __get($property)
    {
        if (property_exists($this->object, $property)) {
            return $this->object->{$property};
        }

        $response = mb_strimwidth($this->response->toJson(), 0, 300, ' ...');

        throw new HubspotApiException("Property \"{$property}\" not exists in response object first level:\n\n{$response}\n\n");
    }

    public function __isset($property): bool
    {
        return property_exists($this->object, $property);
    }

    private function verifyIterable(): void
    {
        if (!is_null($this->iteratorObject)) {
            return;
        }

        $response = mb_strimwidth($this->response->toJson(), 0, 300, ' ...');

        throw new HubspotApiException(
            "Resource response is not iterable or countable:\n\n{$response}\n\n"
        );
    }

    public function count(): int
    {
        $this->verifyIterable();

        return count($this->iteratorObject);
    }

    public function rewind(): void
    {
        $this->verifyIterable();

        reset($this->iteratorObject);
    }
    
    public function current(): mixed
    {
        return current($this->iteratorObject);
    }
    
    public function key(): mixed
    {
        return key($this->iteratorObject);
    }
    
    public function next(): void
    {
        next($this->iteratorObject);
    }
    
    public function valid(): bool
    {
        return !is_null(key($this->iteratorObject));
    }

    public function toArray(): array
    {
        return $this->array;
    }

    public function toJson(): string|null
    {
        return $this->response->toJson();
    }

    public function jsonSerialize(): mixed
    {
        return $this->array;
    }
}
