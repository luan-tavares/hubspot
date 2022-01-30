<?php

namespace LTL\HubspotApi\Request\Components;

use LTL\HubspotApi\Request\Components\RequestComponent;
use LTL\HubspotApi\Request\Interfaces\CurlComponentInterface;
use LTL\HubspotApi\Traits\MethodsListable;

class CurlRequestComponent extends RequestComponent implements CurlComponentInterface
{
    use MethodsListable;

    public function progressBar(): self
    {
        $this['progress'] = true;

        return $this;
    }
}
