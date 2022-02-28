<?php
 
namespace LTL\Hubspot\Core\Interfaces\Request;

interface RequestInterface
{
    public function destroyComponents(): void;

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

    public function addApikeyWithoutObserver(string|null $apikey): self;
    public function removeApikey(): self;

    public function addOAuthWithoutObserver(string $oAuth): self;
    public function removeOAuth(): self;

    public function hasDispatched(): bool;
    public function changeDispatchToTrue(): void;
}
