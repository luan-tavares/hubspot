<?php

namespace LTL\Hubspot\Core\Resource\Interfaces;

/**
 * @implements \ArrayAccess<string|int,array|int|string|null>
 * @implements \IteratorAggregate<int, TIterator>
 * @template TIterator
 */
interface ResourceInterface extends
    \LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface,
    \LTL\Hubspot\Interfaces\ArrayableInterface,
    \LTL\Hubspot\Interfaces\JsonableInterface,
    \LTL\Hubspot\Interfaces\EnumerableInterface,
    \ArrayAccess,
    \IteratorAggregate,
    \Countable
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
    public function isNotFoundError(): bool;
    public function error(): bool;
    public function headers(): array|null;
    public function empty(): bool;
}
