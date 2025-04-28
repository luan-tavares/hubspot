<?php

namespace LTL\Hubspot\Core\Response\Interfaces;

use Countable;
use Iterator;
use JsonSerializable;
use LTL\Hubspot\Interfaces\ArrayableInterface;
use LTL\Hubspot\Interfaces\JsonableInterface;

interface ResponseInterface extends ArrayableInterface, JsonableInterface, Iterator, Countable, JsonSerializable
{
    public function getStatus(): int;
    public function getUri(): string;
    public function hasErrors(): bool;
    public function isServerError(): bool;
    public function isMultiStatus(): bool;
    public function isTooManyRequestsError(): bool;
    public function isInvalidEmailError(): bool;
    public function getHeaders(): array|null;
    public function getResult(): array|object|null;
    public function getAfter(): int|string|null;
    public function empty(): bool;
}
