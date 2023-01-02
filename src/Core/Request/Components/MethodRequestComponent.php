<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Interfaces\Request\MethodComponentInterface;
use LTL\Hubspot\Core\Request\Components\AbstractRequestComponent;

class MethodRequestComponent extends AbstractRequestComponent implements MethodComponentInterface
{
    private string $method;

    protected function register(): void
    {
    }

    public function set(string $method): void
    {
        $this->method = $method;
    }

    public function get(): string
    {
        return $this->method;
    }
}
