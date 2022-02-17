<?php

namespace LTL\Hubspot\Services\Curl;

interface CurlInterface
{
    public function addParams(array $params): self;
    public function addHeaders(array $headers): self;
    public function getResponse(): string|null;
    public function getHeaders(): array|null;
    public function getStatus(): int;
    public function hasError(): int;
    public function getUri(): string;

    public function connect(string $method, array|null $body = null): self;
    public function get(): self;
    public function post(array|null $body = null): self;
    public function put(array|null $body = null): self;
    public function patch(array|null $body = null): self;
    public function delete(): self;
}
