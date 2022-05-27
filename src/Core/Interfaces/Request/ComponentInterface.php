<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Request\Components\RequestComponent;

interface ComponentInterface
{
    public function request(): RequestInterface|null;
    public function addNotNull(string $name, string|int|array|bool|null $value): RequestComponent;
    public function add(string $name, string|int|array|bool|null $value = null): RequestComponent;
    public function addArrayAfter(array|null $array): RequestComponent;
    public function addArrayBefore(array|null $array): RequestComponent;
    public function all(): array;
    public function delete(int|string $key): void;
}
