<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\ResponseObjectStorage;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Services\Curl\Curl;

class Response implements ResponseInterface
{
    private int $status;

    private string $response;

    private $header;

    private $uri;

    public function __construct(Curl $curl, private ActionSchemaInterface $actionSchema)
    {
        $this->status = $curl->getStatus();
        $this->response = $curl->getResponse();
        $this->uri = $this->hideApikey($curl->getUri());
    }

    public function __destruct()
    {
        ResponseObjectStorage::unset($this);
    }

    public function __get($property)
    {
        if ($property === 'index') {
            return $this->getIndex();
        }

        if ($property === 'after') {
            return @$this->getAfter();
        }

        if (!property_exists(ResponseObjectStorage::get($this), $property)) {
            throw new HubspotApiException(
                "Property \"{$property}\" not exists in response first level:\n{$this->response}"
            );
        }

        return ResponseObjectStorage::get($this)->{$property};
    }

    private function getIndex(): int|string|null
    {
        if (
            is_null($this->actionSchema->iterator)||
            !property_exists(ResponseObjectStorage::get($this), $this->actionSchema->iterator)
        ) {
            throw new HubspotApiException(get_class($this) ."::{$this->getAction()}() response is not iterable/countable:\n{$this->response}");
        }

        return $this->actionSchema->iterator;
    }

    private function getAfter(): int|string|null
    {
        $map = explode('.', $this->actionSchema->after);
     
        $after = ResponseObjectStorage::get($this);

        foreach ($map as $current) {
            $after = @$after->{$current};
        }

        return $after;
    }

    private function hideApikey(string $uri): string
    {
        preg_match('/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/', $uri, $uuid);

        return str_replace($uuid, 'xxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', $uri);
    }

    public function getStatus(): int
    {
        return $this->status;
    }
    
    public function get(): ?string
    {
        return $this->response;
    }

    public function getArray(): ?array
    {
        return json_decode($this->response, true);
    }

    public function getDocumentation(): ?string
    {
        return $this->actionSchema->documentation;
    }

    public function getAction(): string
    {
        return $this->actionSchema->action;
    }
}
