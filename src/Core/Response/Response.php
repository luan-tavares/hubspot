<?php

namespace LTL\Hubspot\Core\Response;

use Countable;
use IteratorAggregate;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\ResponseRepositoryContainer;
use LTL\Hubspot\Core\HubspotApikey;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Response\ResponseRepository;

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
        $this->status = $curl->status();
        $this->rawResponse = $curl->raw();
        $this->uri = HubspotApikey::uriMask($curl->uri());
        $this->headers = $curl->headers();
    }

    public function __destruct()
    {
        ResponseRepositoryContainer::destroy($this);
    }

    public function __get($property)
    {
        return ResponseRepositoryContainer::get($this)->{$property};
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
        return ResponseRepositoryContainer::get($this)->toArray();
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
        return ($this->status < 200 || $this->status >= 300);
    }

    public function isMultiStatus(): bool
    {
        return $this->status === HubspotConfig::MULTI_STATUS_CODE;
    }

    public function isTooManyRequestsError(): bool
    {
        return $this->status === HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE;
    }

    public function getIterator(): ResponseRepository
    {
        return ResponseRepositoryContainer::get($this);
    }

    public function count(): int
    {
        return count(ResponseRepositoryContainer::get($this));
    }
}