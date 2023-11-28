<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Request\ResourceRequestComponentInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class ResourceRequestComponent extends AbstractRequestComponent implements ResourceRequestComponentInterface
{
    use PublicMethodsListable;

    protected function register(): void
    {
        $this->exceptionIfRequestError(false);
    }

    public function tooManyRequestsTries(int $tries = HubspotConfig::TOO_MANY_REQUESTS_TRIES): self
    {
        if($tries > HubspotConfig::TOO_MANY_REQUESTS_TRIES || $tries < 1) {
            throw new HubspotApiException('Max too Many Request tries must be less 15 or more 0');
        }

        return $this->addNotNull('requestTries', $tries);
    }

    public function exceptionIfRequestError(bool $hasException = true): self
    {
        return $this->addNotNull('exception', $hasException);
    }
}
