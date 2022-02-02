<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;

interface UriComponentInterface extends ComponentInterface
{
    public function set(string $uri): void;
    public function setMethod(string $method): void;
    public function get(): ?string;
    public function getMethod(): string;
}
