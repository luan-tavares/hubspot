<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;

interface ResourceRequestComponentInterface extends ComponentInterface
{
    public function tooManyRequestsTries(int $tries = HubspotConfig::TOO_MANY_REQUESTS_TRIES): self;
    public function exceptionIfRequestError(bool $hasException = true): self;
}
