<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Components\AbstractRequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;

interface ComponentInterface
{
    public function request(): RequestInterface|null;
    public function addNotNull(string $name, string|int|array|bool|null $value): AbstractRequestComponent;
    public function addNull(string $name): AbstractRequestComponent;
    public function add(string $name, string|int|array|bool|null $value = null): AbstractRequestComponent;
    public function addArrayAfter(array|null $array): AbstractRequestComponent;
    public function addArrayBefore(array|null $array): AbstractRequestComponent;
    public function value(string $index): int|null|string|array|bool;
    public function all(): array;
    public function delete(int|string $key): void;
    public function boot(): void;
}
