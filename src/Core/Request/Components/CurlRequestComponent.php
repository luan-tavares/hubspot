<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Curl\CurlProgressBar;
use LTL\Hubspot\Core\Interfaces\Request\CurlComponentInterface;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class CurlRequestComponent extends RequestComponent implements CurlComponentInterface
{
    use PublicMethodsListable;

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
