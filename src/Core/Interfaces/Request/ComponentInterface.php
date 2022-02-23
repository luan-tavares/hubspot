<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Request\Components\RequestComponent;

interface ComponentInterface
{
    public function getRequest(): RequestInterface;
    public function add(string $name, string|int|array|bool|null $value): RequestComponent;
    public function addArray(array|null $array): RequestComponent;
    public function all(): array;
    public function delete(int|string $key): void;
}
