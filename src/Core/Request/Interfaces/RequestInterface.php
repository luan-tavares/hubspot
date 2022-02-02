<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;

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

    public function removeHeader(string $header): self;
    public function removeQuery(string $query): self;
    public function addQuery(array $queries): self;
    public function addBody(?array $body): self;
    public function addUri(string $uri): self;
    public function addMethod(string $method): self;
    public function addContentType(?string $contentType): self;

    public function getActionDefinition(string $action): ActionSchemaInterface;

    public function getResource(): ResourceInterface;

    public function dispatch(string $action, ?array $arguments): ResponseInterface;
}
