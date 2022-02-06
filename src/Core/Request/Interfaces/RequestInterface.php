<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;

interface RequestInterface
{
    public function getBody(): ?array;
    public function getHeaders(): array;
    public function getQueries(): array;
    public function getCurlParams(): array;

    public function removeHeader(string $header): self;
    public function removeQuery(string $query): self;
    public function addQueries(array|null $queries): self;
    public function addBody(array|null $body): self;
    public function addHeaders(array|null $headers): self;

    public function dispatch(string $action, array $arguments): ResponseInterface;
    public function dispatched(): bool;
}
