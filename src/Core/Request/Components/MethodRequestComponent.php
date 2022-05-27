<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Interfaces\Request\MethodComponentInterface;
use LTL\Hubspot\Core\Request\Components\RequestComponent;

class MethodRequestComponent extends RequestComponent implements MethodComponentInterface
{
    private string $method;

    public function set(string $method): void
    {
        $this->method = $method;
    }

    public function get(): string
    {
        return $this->method;
    }
}
