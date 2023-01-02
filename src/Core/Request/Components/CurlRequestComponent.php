<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Curl\CurlProgressBar;
use LTL\Hubspot\Core\Interfaces\Request\CurlComponentInterface;
use LTL\Hubspot\Core\Request\Components\AbstractRequestComponent;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class CurlRequestComponent extends AbstractRequestComponent implements CurlComponentInterface
{
    use PublicMethodsListable;

    protected function register(): void
    {
    }

    public function withProgressBar(): self
    {
        $this->addNotNull(CURLOPT_NOPROGRESS, false);
        $this->addNotNull(CURLOPT_PROGRESSFUNCTION, CurlProgressBar::class .'::progress');

        return $this;
    }

    public function withResponseHeaders(): self
    {
        $this->addNotNull(CURLOPT_HEADER, true);

        return $this;
    }
}
