<?php

namespace LTL\Hubspot\Core\Interfaces\Resource;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
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
    public function status(): int|null;
    public function documentation(): string|null;
    public function headers(): array|null;
    public function error(): bool;
    public function isMultiStatus(): bool;
    public function isTooManyRequestsError(): bool;
    public function invalidEmailError(): bool;
    public function empty(): bool;

    #[Override]
    public function getIterator(): ResponseInterface;/** */
}
