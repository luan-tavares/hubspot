<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;

interface ResourceRequestComponentInterface extends ComponentInterface
{
    public function tooManyRequestsTries(): self;
    public function exceptionIfRequestError(bool $hasException = true): self;
}
