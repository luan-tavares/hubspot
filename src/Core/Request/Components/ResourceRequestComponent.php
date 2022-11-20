<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Interfaces\Request\ResourceRequestComponentInterface;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class ResourceRequestComponent extends RequestComponent implements ResourceRequestComponentInterface
{
    use PublicMethodsListable;

    protected function initConfig(): void
    {
        $this->tooManyRequestsTries();
        $this->exceptionIfRequestError(false);
    }

    public function tooManyRequestsTries(int $tries = 1): self
    {
        if ($tries < 1) {
            throw new HubspotApiException('Method "tooManyRequestsTries" :: Tries mus be greater or equal 1');
        }

        return $this->addNotNull('requestTries', $tries);
    }

    public function exceptionIfRequestError(bool $hasException = true): self
    {
        return $this->addNotNull('exception', $hasException);
    }
}