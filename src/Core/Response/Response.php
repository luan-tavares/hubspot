<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Containers\ResponseObjectContainer;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Services\Curl\Curl;

class Response implements ResponseInterface
{
    private int $status;

    private string|null $response;

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
        $this->destroy();
    }

    public function __get($property)
    {
        if ($property === 'index') {
            return $this->getIndex();
        }

        if ($property === 'after') {
            return $this->getAfter();
        }

        if ($property === 'object') {
            return ResponseObjectContainer::get($this);
        }

        return ResponseObjectContainer::get($this)->{$property};
    }

    private function getIndex()
    {
        return $this->actionSchema->iterable;
    }

    private function getAfter(): int|string|null
    {
        $map = explode('.', $this->actionSchema->after);
     
        $after = ResponseObjectContainer::get($this);

        
        foreach ($map as $current) {
            if (!isset($after->{$current})) {
                return null;
            }
            $after = @$after->{$current};
        }
       

        return $after;
    }

    private function hideApikey(string $uri): string
    {
        preg_match('/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/', $uri, $uuid);

        return str_replace($uuid, 'xxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', $uri);
    }

    public function destroy(): void
    {
        ResponseObjectContainer::destroy($this);
    }

    public function getStatus(): int
    {
        return $this->status;
    }
    
    public function get(): ?string
    {
        return $this->response;
    }

    public function getDocumentation(): ?string
    {
        return $this->actionSchema->documentation;
    }
}
