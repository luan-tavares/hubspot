<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Request\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    public function __construct(private string $response, private string $status, private string $action)
    {
    }

    public function getStatus(): int
    {
        return $this->status;
    }
    
    public function get(): ?string
    {
        return $this->response;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }
}
