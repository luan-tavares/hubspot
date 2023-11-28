<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Request\RequestArguments;

interface RequestInterface
{
    public function destroyComponents(): void;

    public function getHeaders(): array;
    public function getQueries(): array;
    public function getCurlParams(): array;
    public function getBody(): array|null;
    public function getUri(): string;
    public function getMethod(): string;
    public function getTooManyRequestsTries(): int|null;
    public function hasExceptionIfRequestError(): bool;

    public function removeHeader(string $header): self;
    public function addHeadersBefore(array|null $headers): self;

    public function removeQuery(string $query): self;

    public function bootComponents(): void;
    
    public function addQueriesAfter(array|null $queries): self;
    public function addQueriesBefore(array|null $queries): self;

    public function addBaseHeader(RequestArguments $requestArguments): self;
    public function addMethod(RequestArguments $requestArguments): self;
    public function addBody(RequestArguments $requestArguments): self;
    public function addUri(RequestArguments $requestArguments): self;

    public function removeApikey(): self;
    public function removeOAuth(): self;

    public function connect(ActionSchemaInterface $actionSchema, array $arguments): CurlInterface;
}
