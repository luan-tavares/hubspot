<?php

namespace LTL\Hubspot\Core\Interfaces\Response;

use LTL\Hubspot\Interfaces\ArrayableInterface;
use LTL\Hubspot\Interfaces\JsonableInterface;

interface ResponseInterface extends ArrayableInterface, JsonableInterface
{
    public function getStatus(): int;
    public function getUri(): string;
    public function hasErrors(): bool;
    public function getDocumentation(): string|null;
    public function getHeaders(): array|null;
    public function destroyObject(): void;
    public function getAfterIndex(): string|null;
    public function getIteratorIndex(): string|null;
}
