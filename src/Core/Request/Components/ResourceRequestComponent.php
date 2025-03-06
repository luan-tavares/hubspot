<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Request\Interfaces\ResourceRequestComponentInterface;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class ResourceRequestComponent extends AbstractRequestComponent implements ResourceRequestComponentInterface
{
    use PublicMethodsListable;

    protected function register(): void
    {
        $this->notWithRequestException();
        $this->addNotNull('tries', 1);
    }

    public function withRequestTries(): self
    {
        return $this->addNotNull('tries', HubspotConfig::MAX_REQUESTS_TRIES);
    }

    public function defineRequestTries(int $tries): self
    {
        return $this->addNotNull('tries', $tries);
    }

    public function withRequestException(): self
    {
        return $this->addNotNull('exception', true);
    }

    public function notWithRequestException(): self
    {
        return $this->addNotNull('exception', false);
    }
}
