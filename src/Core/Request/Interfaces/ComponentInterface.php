<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;

interface ComponentInterface
{
    public function getRequest(): RequestInterface;
    public function add(string $name, string|int|array|bool|null $value): RequestComponent;
    public function addArray(array|null $array): RequestComponent;
    public function all(): array;
    public function delete(int|string $key): void;
}
