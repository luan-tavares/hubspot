<?php

namespace LTL\Hubspot\Core\Resource\Interfaces;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface ResourceInterface extends PublicMethodsListableInterface, Countable, IteratorAggregate, ArrayAccess
{
    public function toArray(): array;
    public function toJson(): string|null;
    public function status(): int|null;
    public function documentation(): string|null;
    public function headers(): array|null;

    public function each(callable $callback): void;
    public function map(callable $callback): array;
    public function filter(callable $callback): array;
    public function mapWithKeys(callable $callback): array;
    public function reduce(callable $callback, $initial = null);
}
