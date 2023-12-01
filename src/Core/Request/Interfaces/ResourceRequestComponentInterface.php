<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;

interface ResourceRequestComponentInterface extends ComponentInterface
{
    public function withRequestTries(): self;
    public function withRequestException(): self;
    public function notWithRequestException(): self;
}
