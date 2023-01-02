<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;

interface ResourceRequestComponentInterface extends ComponentInterface
{
    public function tooManyRequestsTries(int $tries = 1): self;
    public function exceptionIfRequestError(bool $hasException = true): self;
}