<?php
namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Core\Interfaces\Response\ResponseRepositoryInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;

/**
 * @property string|int $after
 */
class ResponseRepository implements ResponseRepositoryInterface
{
    private object|array|null $object;

    private array $array;

    private array|null $iterator;

    private string|int|null $after;

    private function __construct()
    {
        /** LTL\Hubspot\Factories\ResponseRepositoryFactory */
    }

    private function __clone()
    {
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

        $response = mb_strimwidth(json_encode($this), 0, 300, ' ...');

        throw new HubspotApiException(
            "Property \"{$property}\" not exists in response object first level:\n\n{$response}\n\n"
        );
    }

    private function verifyIterable(): void
    {
        if (!is_null($this->iterator)) {
            return;
        }

        $response = mb_strimwidth(json_encode($this), 0, 300, ' ...');

        throw new HubspotApiException(
            "Resource response is not iterable or countable:\n\n{$response}\n\n"
        );
    }

    public function after(): string|int|null
    {
        return $this->after;
    }

    public function toArray(): array
    {
        return $this->array;
    }

    public function jsonSerialize(): mixed
    {
        return $this->array;
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
}
