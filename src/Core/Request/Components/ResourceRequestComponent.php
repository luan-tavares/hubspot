<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Request\ResourceRequestComponentInterface;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class ResourceRequestComponent extends AbstractRequestComponent implements ResourceRequestComponentInterface
{
    use PublicMethodsListable;

    protected function register(): void
    {
        $this->exceptionIfRequestError(false);
    }

    public function tooManyRequestsTries(): self
    {
        return $this->addNotNull('requestTries', HubspotConfig::TOO_MANY_REQUESTS_TRIES);
    }

    public function exceptionIfRequestError(bool $hasException = true): self
    {
        return $this->addNotNull('exception', $hasException);
    }
}
