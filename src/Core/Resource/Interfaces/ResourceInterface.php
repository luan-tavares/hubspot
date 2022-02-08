<?php

namespace LTL\Hubspot\Core\Resource\Interfaces;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use LTL\Hubspot\Services\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface ResourceInterface extends PublicMethodsListableInterface, Countable, IteratorAggregate, ArrayAccess
{
    public function toArray(): array;
    public function toJson(): ?string;
    public function status(): ?int;
    public function documentation(): ?string;
    public function headers(): array|null;

    public function each(callable $callback): void;
    public function map(callable $callback): array;
    public function filter(callable $callback): array;
    public function mapWithKeys(callable $callback): array;
    public function reduce(callable $callback, $initial = null);
}
