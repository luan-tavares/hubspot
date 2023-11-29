<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Request\RequestArguments;

interface RequestInterface
{
    public function destroyComponents(): void;
    public function bootComponents(): void;

    public function getHeaders(): array;
    public function getQueries(): array;
    public function getCurlParams(): array;
    public function getTooManyRequestsTries(): int|null;
    public function hasExceptionIfRequestError(): bool;

    public function addUriArguments(RequestArguments $requestArguments): self;
    public function addBaseHeader(RequestArguments $requestArguments): self;

    public function removeApikey(): self;
    public function removeOAuth(): self;

    public function connect(ActionSchemaInterface $actionSchema, array $arguments): CurlInterface;
}
