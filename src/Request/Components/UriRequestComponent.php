<?php

namespace LTL\HubspotApi\Request\Components;

use Exception;
use LTL\HubspotApi\Request\Components\RequestComponent;

class UriRequestComponent extends RequestComponent
{
    private string $uri;

    private string $action;

    public function addUri(string $uri): void
    {
        $this->uri = $uri;
    }

    public function addAction(string $action): void
    {
        $this->action = $action;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }
 
    public function getAction(): string
    {
        return $this->action;
    }
}
