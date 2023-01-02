<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Request\Components\AbstractRequestComponent;

interface ComponentInterface
{
    public function request(): RequestInterface|null;
    public function addNotNull(string $name, string|int|array|bool|null $value): AbstractRequestComponent;
    public function add(string $name, string|int|array|bool|null $value = null): AbstractRequestComponent;
    public function addArrayAfter(array|null $array): AbstractRequestComponent;
    public function addArrayBefore(array|null $array): AbstractRequestComponent;
    public function value(string $index): int|null|string|array|bool;
    public function all(): array;
    public function delete(int|string $key): void;
    public function boot(): void;
}
