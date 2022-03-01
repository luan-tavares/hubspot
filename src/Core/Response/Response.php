<?php

namespace LTL\Hubspot\Core\Response;

use Countable;
use IteratorAggregate;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\ResponseObjectContainer;
use LTL\Hubspot\Core\HubspotApikey;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Response\ResponseObject;

/**
 * @property string|int $after
 */
class Response implements ResponseInterface, IteratorAggregate, Countable
{
    private array|null $headers;
   
    private string|null $rawResponse;

    private int $status;

    private string $uri;

    public function __construct(CurlInterface $curl, private ActionSchemaInterface $actionSchema)
    {
        $this->status = $curl->getStatus();
        $this->rawResponse = $curl->getResponse();
        $this->uri = HubspotApikey::uriMask($curl->getUri());
        $this->headers = $curl->getHeaders();
    }

    public function __destruct()
    {
        ResponseObjectContainer::destroy($this);
    }

    public function __get($property)
    {
        return ResponseObjectContainer::get($this)->{$property};
    }

    public function getAfterIndex(): string|null
    {
        return $this->actionSchema->afterIndex;
    }

    public function getIteratorIndex(): string|null
    {
        return $this->actionSchema->iteratorIndex;
    }

    public function toArray(): array
    {
        return ResponseObjectContainer::get($this)->toArray();
    }

    public function toJson(): string|null
    {
        return $this->rawResponse;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getDocumentation(): string|null
    {
        return $this->actionSchema->documentation;
    }

    public function getHeaders(): array|null
    {
        return $this->headers;
    }

    public function hasErrors(): bool
    {
        return ($this->status < 200 || $this->status > 299);
    }

    public function getIterator(): ResponseObject
    {
        return ResponseObjectContainer::get($this);
    }

    public function count(): int
    {
        return count(ResponseObjectContainer::get($this));
    }
}
