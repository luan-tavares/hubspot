<?php

namespace LTL\Hubspot\Core\Resource\Interfaces;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use LTL\Hubspot\Interfaces\ArrayableInterface;
use LTL\Hubspot\Interfaces\EnumerableInterface;
use LTL\Hubspot\Interfaces\JsonableInterface;
use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;

/**
 * @implements ArrayAccess<string|int,array|int|string|null>
 * @implements IteratorAggregate<int, TIterator>
 * @template TIterator
 */
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
    public function isServerError(): bool;
    public function isTooManyRequestsError(): bool;
    public function error(): bool;
    public function headers(): array|null;
    public function empty(): bool;
}
