<?php

namespace LTL\Hubspot\Core\Response\Interfaces;

use Countable;
use IteratorAggregate;
use LTL\Hubspot\Core\Response\Interfaces\ResponseDataInterface;
use LTL\Hubspot\Interfaces\ArrayableInterface;
use LTL\Hubspot\Interfaces\JsonableInterface;
use Override;

interface ResponseInterface extends ArrayableInterface, JsonableInterface, IteratorAggregate, Countable
{
    public function getStatus(): int;
    public function getUri(): string;
    public function hasErrors(): bool;
    public function isMultiStatus(): bool;
    public function isTooManyRequestsError(): bool;
    public function isInvalidEmailError(): bool;
    public function getDocumentation(): string|null;
    public function getHeaders(): array|null;
    public function getResult(): array|object|null;
    public function getAfter(): int|string|null;
    public function empty(): bool;

    #[Override]
    public function getIterator(): ResponseDataInterface;
}
