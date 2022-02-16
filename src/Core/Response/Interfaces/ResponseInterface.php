<?php

namespace LTL\Hubspot\Core\Response\Interfaces;

use LTL\Hubspot\Core\Response\ResponseObject;

interface ResponseInterface
{
    public function getStatus(): int;
    public function hasError(): bool;
    public function get(): string|null;
    public function getDocumentation(): string|null;
    public function getHeaders(): array|null;
    public function destroy(): void;
}
