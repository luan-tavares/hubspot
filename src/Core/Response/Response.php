<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\ResponseArrayStorage;
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
        $this->uri = $this->hiddeApikey($curl->getUri());
    }

    public function __destruct()
    {
        ResponseArrayStorage::unset($this);
    }

    private function hiddeApikey(string $uri): string
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

    public function toArray(): ?array
    {
        return ResponseArrayStorage::get($this);
    }

    public function getDocumentation(): ?string
    {
        return $this->actionSchema->documentation;
    }

    public function getIterator(): ?string
    {
        return $this->actionSchema->iterator;
    }

    public function getAction(): string
    {
        return $this->actionSchema->action;
    }

    /**Countable */
    public function count(): int
    {
        return count($this->toArray());
    }

    /**ArrayAccess */
    public function offsetSet($offset, $value): void
    {
    }

    public function offsetExists($offset): bool
    {
        return isset($this->toArray()[$offset]);
    }

    public function offsetUnset($offset): void
    {
    }

    public function offsetGet($offset): mixed
    {
        return $this->toArray()[$offset];
    }
}
