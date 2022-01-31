<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Components\RequestComponent;

class UriRequestComponent extends RequestComponent
{
    private string $uri;

    private string $method;

    public function addUri(string $uri): void
    {
        $this->uri = $uri;
    }

    public function addMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }
 
    public function getMethod(): string
    {
        return $this->method;
    }
}
