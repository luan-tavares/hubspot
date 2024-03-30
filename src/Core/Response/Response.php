<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Globals\ApikeyGlobal;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Response\Interfaces\ResponseDataInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Factories\ResponseDataFactory;

class Response implements ResponseInterface
{
    private array|null $headers;

    private int $status;

    private string $uri;

    private string|null $documentation;

    private ResponseDataInterface $data;

    public function __construct(CurlInterface $curl, ActionSchemaInterface $actionSchema)
    {
        $this->status = $curl->status();
        $this->documentation = $actionSchema->documentation;
        $this->uri = ApikeyGlobal::uriMask($curl->uri());
        $this->headers = $curl->headers();
        $this->data = ResponseDataFactory::build($actionSchema, $curl);
    }

    public function __get($property)
    {
        return $this->data->{$property};
    }

    public function getAfter(): int|string|null
    {
        return $this->data->getAfter();
    }

    public function toArray(): array
    {
        return $this->data->toArray();
    }

    public function getResult(): array|object|null
    {
        return $this->data->getResult();
    }

    public function toJson(): string
    {
        return $this->data->getRaw();
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
        return $this->documentation;
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

        if (!strpos($this->data->getRaw(), 'INVALID_EMAIL')) {
            return false;
        }

        return true;
    }

    public function getIterator(): ResponseDataInterface
    {
        return $this->data;
    }

    public function count(): int
    {
        return count($this->data);
    }

    public function empty(): bool
    {
        return ($this->count() === 0);
    }
}
