<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ResourceSchemaInterface;

interface RequestInterface
{
    public function reset(): void;

    public function getBody(): ?array;
    public function getHeaders(): array;
    public function getQueries(): array;
    public function getUri(): string;
    public function getMethod(): string;
    public function getCurlChanges(): array;
    public function hasConnected(): bool;

    public function removeHeader(string $header): void;
    public function removeQuery(string $query): void;

    public function getSchema(): ResourceSchemaInterface;
    public function getActionSchema(string $action): ActionSchemaInterface;

    public function getResource(): ResourceInterface;

    public function dispatch(string $action, ?array $arguments): ResponseInterface;
}
