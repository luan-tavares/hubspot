<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Curl\CurlProgressBar;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Request\Components\AbstractRequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\CurlComponentInterface;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class CurlRequestComponent extends AbstractRequestComponent implements CurlComponentInterface
{
    use PublicMethodsListable;

    protected function register(): void
    {
        $this->setTimeout(HubspotConfig::TIMEOUT);
    }

    public function withProgressBar(): self
    {
        $this->addNotNull(CURLOPT_NOPROGRESS, false);
        $this->addNotNull(CURLOPT_PROGRESSFUNCTION, CurlProgressBar::class . '::progress');

        return $this;
    }

    public function withHeaders(): self
    {
        $this->addNotNull(CURLOPT_HEADER, true);

        return $this;
    }

    public function setTimeout(int $timeout): self
    {
        $this->addNotNull(CURLOPT_TIMEOUT, $timeout);

        return $this;
    }
}
