<?php

namespace LTL\Hubspot\Core\Resource\Interfaces;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Interfaces\ArrayableInterface;
use LTL\Hubspot\Interfaces\EnumerableInterface;
use LTL\Hubspot\Interfaces\JsonableInterface;
use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;
use Override;

interface ResourceInterface extends
    PublicMethodsListableInterface,
    ArrayableInterface,
    JsonableInterface,
    EnumerableInterface,
    ArrayAccess,
    IteratorAggregate,
    Countable
{
    public function toArray(): array;
    public function toJson(): string;
    public function getAfter(): string|int|null;
    public function data(): object|array|null;
    public function status(): int;
    public function isMultiStatus(): bool;
    public function invalidEmailError(): bool;
    public function isTooManyRequestsError(): bool;
    public function error(): bool;
    public function documentation(): string|null;
    public function headers(): array|null;
    public function empty(): bool;
    #[Override]
    public function getIterator(): ResponseInterface;
}
