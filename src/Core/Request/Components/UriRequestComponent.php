<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\UriComponentInterface;

class UriRequestComponent extends RequestComponent implements UriComponentInterface
{
    private string $uri;

    private string $method;

    public function set(string $uri): void
    {
        $this->uri = $uri;
    }



    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function get(): ?string
    {
        return $this->uri;
    }
 
    public function getMethod(): string
    {
        return $this->method;
    }
}
