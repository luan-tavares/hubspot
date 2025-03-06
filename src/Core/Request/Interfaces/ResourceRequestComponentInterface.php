<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;
use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface ResourceRequestComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    public function withRequestTries(): self;
    public function withRequestException(): self;
    public function notWithRequestException(): self;
    public function defineRequestTries(int $tries): self;
}
