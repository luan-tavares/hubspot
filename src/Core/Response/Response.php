<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\ResponseRepositoryContainer;
use LTL\Hubspot\Core\Globals\ApikeyGlobal;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseRepositoryInterface;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;

/**
 * @property string|int $after
 */
class Response implements ResponseInterface
{
    private array|null $headers;
   
    private string $rawResponse;

    private int $status;

    private string $uri;

    public function __construct(CurlInterface $curl, private ActionSchemaInterface $actionSchema)
    {
        $this->status = $curl->status();
        $this->rawResponse = $curl->response();
        $this->uri = ApikeyGlobal::uriMask($curl->uri());
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

    public function toJson(): string
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
        return ($this->status === HubspotConfig::MULTI_STATUS_CODE);
    }

    public function isTooManyRequestsError(): bool
    {
        return ($this->status === HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE);
    }

    public function isInvalidEmailError(): bool
    {
        if (!$this->hasErrors()) {
            return false;
        }

        if (!strpos($this->rawResponse, 'INVALID_EMAIL')) {
            return false;
        }

        return true;
    }

    public function getIterator(): ResponseRepositoryInterface
    {
        return ResponseRepositoryContainer::get($this);
    }

    public function count(): int
    {
        return count(ResponseRepositoryContainer::get($this));
    }

    public function empty(): bool
    {
        return ($this->count() === 0);
    }
}
