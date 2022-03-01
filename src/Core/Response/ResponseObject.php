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
    private object|array|null $object;

    private array $array;
   
    private string|null $json;

    private array|null $iterator = null;

    private string|int|null $after = null;

    public function __construct(ResponseInterface $response)
    {
        $this->json = $response->toJson();

        $this->object = json_decode($response->toJson());

        $this->array = json_decode($response->toJson(), true) ?? [];

        if (is_array($this->object)) {
            $this->iterator = $this->object;

            return;
        }

        if (is_null(@$this->object->{$response->getIteratorIndex()})) {
            return;
        }

        $this->iterator = (array) @$this->object->{$response->getIteratorIndex()};

        if (is_null($response->getAfterIndex())) {
            return;
        }

        $this->after = $this->getAfter($response->getAfterIndex());
    }

    private function getAfter(string $afterIndex): int|string|null
    {
        $map = explode('.', $afterIndex);
    
        $after = $this->object;
       
        foreach ($map as $current) {
            if (!isset($after->{$current})) {
                return null;
            }
            $after = @$after->{$current};
        }
       
        return $after;
    }


    public function __isset($property): bool
    {
        return property_exists($this->object, $property);
    }

    public function __get($property)
    {
        if ($property === 'after') {
            return $this->after;
        }

        if (property_exists($this->object, $property)) {
            return $this->object->{$property};
        }

        $response = mb_strimwidth($this->json, 0, 300, ' ...');

        throw new HubspotApiException("Property \"{$property}\" not exists in response object first level:\n\n{$response}\n\n");
    }




    private function verifyIterable(): void
    {
        if (!is_null($this->iterator)) {
            return;
        }

        $response = mb_strimwidth($this->json, 0, 300, ' ...');

        throw new HubspotApiException(
            "Resource response is not iterable or countable:\n\n{$response}\n\n"
        );
    }

    public function count(): int
    {
        $this->verifyIterable();

        return count($this->iterator);
    }

    public function rewind(): void
    {
        $this->verifyIterable();

        reset($this->iterator);
    }
    
    public function current(): mixed
    {
        return current($this->iterator);
    }
    
    public function key(): mixed
    {
        return key($this->iterator);
    }
    
    public function next(): void
    {
        next($this->iterator);
    }
    
    public function valid(): bool
    {
        return !is_null(key($this->iterator));
    }

    public function toArray(): array
    {
        return $this->array;
    }

    public function toJson(): string|null
    {
        return $this->json;
    }

    public function jsonSerialize(): mixed
    {
        return $this->array;
    }
}
