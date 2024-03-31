<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Globals\ApikeyGlobal;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\StatusResponse;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;

class Response implements ResponseInterface
{
    private array|null $headers;

    private StatusResponse $status;

    private string $uri;

    private object|array|null $result;

    private string $raw;

    private string|int|null $after;

    public function __construct(CurlInterface $curl, ActionSchemaInterface $actionSchema, RequestInfoObject $requestInfoObject)
    {
        $raw = $curl->response();
        $this->status = new StatusResponse($curl->status(), $raw);
        $this->uri = ApikeyGlobal::uriMask($curl->uri());
        $this->headers = $curl->headers();
        $this->raw = $raw;

        $responseObject = new ResponseObject($actionSchema, $curl, $requestInfoObject);

        $this->result = $responseObject->result;
        $this->after = $responseObject->after;
    }

    public function __get($property)
    {
        if(!is_null($value = @$this->result->{$property})) {
            return $value;
        }
      
        throw new HubspotApiException("Property {$property} not exists in response");
        
    }

    public function __isset($property): bool
    {
        if (!is_object($this->result)) {
            return false;
        }

        return property_exists($this->result, $property);
    }

    public function getAfter(): int|string|null
    {
        return $this->after;
    }

    public function toArray(): array
    {
        return json_decode($this->raw, true) ?? [];
    }

    public function toJson(): string
    {
        return $this->raw;
    }

    public function getResult(): array|object|null
    {
        return $this->result;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getHeaders(): array|null
    {
        return $this->headers;
    }

    /**Status */

    public function getStatus(): int
    {
        return $this->status->get();
    }

    public function hasErrors(): bool
    {
        return $this->status->hasErrors();
    }

    public function isMultiStatus(): bool
    {
        return $this->status->isMultiStatus();
    }

    public function isTooManyRequestsError(): bool
    {
        return $this->status->isTooManyRequestsError();
    }

    public function isInvalidEmailError(): bool
    {
        return $this->status->isInvalidEmailError();
    }

    /**JsonSerializable */

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }

    /** */

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

    /**Iterator */

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

    /**Countable */

    public function count(): int
    {
        $this->verifyIterable();

        return count($this->result);
    }

    public function empty(): bool
    {
        return ($this->count() === 0);
    }
}
