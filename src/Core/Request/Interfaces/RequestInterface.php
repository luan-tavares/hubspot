<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestArgumentsInterface;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;

interface RequestInterface
{
    public function destroyComponents(): void;
    public function bootComponents(): void;

    public function getHeaders(): array;
    public function getQueries(): array;
    public function getCurlParams(): array;
    public function getTooManyRequestsTries(): int|null;
    public function hasExceptionIfRequestError(): bool;
    public function removeException(): self;

    public function addUriArguments(RequestArgumentsInterface $requestArguments): self;
    public function addBaseHeader(RequestArgumentsInterface $requestArguments): self;

    public function removeApikey(): self;
    public function removeOAuth(): self;

    public function connect(ActionSchemaInterface $actionSchema, array $arguments): CurlInterface;
}
