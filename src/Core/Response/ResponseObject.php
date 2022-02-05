<?php
namespace LTL\Hubspot\Core\Response;

use Countable;
use Iterator;
use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;

class ResponseObject implements Iterator, Countable
{
    private object|null $object;

    public function __construct(private ResponseInterface $response)
    {
        $this->object = json_decode($this->response->get());
    }

    public function __get($property)
    {
        if (!property_exists($this->object, $property)) {
            $response = mb_strimwidth($this->response->get(), 0, 300, ' ...');

            throw new HubspotApiException("Property \"{$property}\" not exists in response object first level:\n\n{$response}\n\n");
        }

        return $this->object->{$property};
    }

    public function __isset($property): bool
    {
        return property_exists($this->object, $property);
    }

    private function verifyIterable(): void
    {
        if (is_null($this->response->index) || !property_exists($this->object, $this->response->index)) {
            $response = mb_strimwidth($this->response->get(), 0, 300, ' ...');

            throw new HubspotApiException(
                "Resource response is not iterable or countable:\n\n{$response}\n\n"
            );
        }
    }

    public function count(): int
    {
        $this->verifyIterable();

        return count($this->object->{$this->response->index});
    }

    public function rewind(): void
    {
        $this->verifyIterable();

        reset($this->object->{$this->response->index});
    }
    
    public function current(): mixed
    {
        return current($this->object->{$this->response->index});
    }
    
    public function key(): mixed
    {
        return key($this->object->{$this->response->index});
    }
    
    public function next(): void
    {
        next($this->object->{$this->response->index});
    }
    
    public function valid(): bool
    {
        return !is_null(key($this->object->{$this->response->index}));
    }
}
