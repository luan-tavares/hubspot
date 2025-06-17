<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Globals\ApikeyGlobal;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\StatusResponse;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Exceptions\HubspotApiException;

class Response implements ResponseInterface
{
    private array|null $headers;

    private StatusResponse $status;

    private string $uri;

    private object|array|null $result;

    private string $raw;

    private string|int|null $after;

    private string|null $iteratorIndex = null;

    private int $pointer = 0;

    private readonly bool $hasErrorIfPropertyNotExists;

    public function __construct(CurlInterface $curl, ActionSchema $actionSchema, RequestInfoObject $requestInfoObject)
    {
        $raw = $curl->response();
        $this->status = new StatusResponse($curl->status(), $raw);
        $this->uri = ApikeyGlobal::uriMask($curl->uri());
        $this->headers = $curl->headers();
        $this->raw = $raw;
        $this->hasErrorIfPropertyNotExists = $requestInfoObject->hasErrorIfPropertyNotExists;

        $responseObject = new ResponseObject($actionSchema, $curl, $requestInfoObject);

        $this->result = $responseObject->result;
        $this->after = $responseObject->after;

        if ($responseObject->isIterator) {
            $this->iteratorIndex = $actionSchema->iteratorIndex;
        }
    }

    public function __get($property)
    {
        if (!is_null($value = @$this->result->{$property})) {
            return $value;
        }

        if (!$this->hasErrorIfPropertyNotExists) {
            return null;
        }

        throw new HubspotApiException("Property \"{$property}\" not exists.");
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

    public function isServerError(): bool
    {
        /** */
        return ($this->status->get() >= 500 && $this->status->get() < 600);
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
        if (!is_null($this->iteratorIndex)) {
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

        $this->pointer = 0;
    }

    public function current(): object|int
    {

        return $this->result->{$this->iteratorIndex}[$this->pointer];
    }

    public function key(): mixed
    {
        return $this->pointer;
    }

    public function next(): void
    {
        $this->pointer++;
    }

    public function valid(): bool
    {
        return isset($this->result->{$this->iteratorIndex}[$this->pointer]);
    }

    /**Countable */

    public function count(): int
    {
        $this->verifyIterable();

        return count($this->result->{$this->iteratorIndex});
    }

    public function empty(): bool
    {
        return ($this->count() === 0);
    }
}
