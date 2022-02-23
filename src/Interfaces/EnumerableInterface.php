<?php

namespace LTL\Hubspot\Interfaces;

interface EnumerableInterface
{
    public function each(callable $callback): void;
    public function map(callable $callback): array;
    public function filter(callable $callback): array;
    public function mapWithKeys(callable $callback): array;
    public function reduce(callable $callback, $initial = null);
}
