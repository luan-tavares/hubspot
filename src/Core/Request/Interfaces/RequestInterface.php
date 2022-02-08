<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;

interface RequestInterface
{
    public function getHeaders(): array;
    public function getQueries(): array;
    public function getCurlParams(): array;
    public function getBody(): array|null;
    public function getUri(): string;

    public function removeHeader(string $header): self;
    public function removeQuery(string $query): self;
    public function addQueries(array|null $queries): self;
    public function addBody(array|null $body): self;
    public function addHeaders(array|null $headers): self;
    public function addUri(string $baseUri, array $associativeParams, array $queries): self;

    public function hasDispatched(): bool;
    public function changeDispatchToTrue(): void;
}
