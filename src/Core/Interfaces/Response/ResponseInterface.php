<?php

namespace LTL\Hubspot\Core\Interfaces\Response;

use LTL\Hubspot\Interfaces\ArrayableInterface;
use LTL\Hubspot\Interfaces\JsonableInterface;

interface ResponseInterface extends ArrayableInterface, JsonableInterface
{
    public function getStatus(): int;
    public function hasError(): bool;
    public function getDocumentation(): string|null;
    public function getHeaders(): array|null;
    public function destroy(): void;
}
