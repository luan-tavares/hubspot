<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\CurlComponentInterface;
use LTL\Hubspot\Core\Traits\MethodsListable;

class CurlRequestComponent extends RequestComponent implements CurlComponentInterface
{
    use MethodsListable;

    public function progressBar(): self
    {
        $this['progress'] = true;

        return $this;
    }
}
