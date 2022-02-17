<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Curl\CurlProgressBar;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\CurlComponentInterface;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class CurlRequestComponent extends RequestComponent implements CurlComponentInterface
{
    use PublicMethodsListable;

    public function withProgressBar(): self
    {
        $this->add(CURLOPT_NOPROGRESS, false);
        $this->add(CURLOPT_PROGRESSFUNCTION, CurlProgressBar::class .'::progress');

        return $this;
    }

    public function withResponseHeaders(): self
    {
        $this->add(CURLOPT_HEADER, true);

        return $this;
    }
}
