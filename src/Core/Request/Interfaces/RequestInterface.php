<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestArgumentsInterface;
use LTL\Hubspot\Core\Schema\ActionSchema;

interface RequestInterface
{
    public function destroyComponents(): void;
    public function bootComponents(): void;

    public function getHeaders(): array;
    public function getQueries(): array;
    public function getCurlParams(): array;
    public function getResponseRequest(): array;
    public function getRequestsTries(): int;
    public function getClientTimeout(): int;
    public function hasWithRequestException(): bool;

    public function addUriArguments(RequestArgumentsInterface $requestArguments): self;
    public function addBaseHeader(RequestArgumentsInterface $requestArguments): self;

    public function removeApikey(): self;
    public function removeOAuth(): self;
    public function setRequestTries(int $limit): self;
    public function removeException(): self;

    public function connect(ActionSchema $actionSchema, array $arguments): CurlInterface;
}
