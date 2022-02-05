<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\CurlComponentInterface;
use LTL\Hubspot\Services\PublicMethods\Traits\PublicMethodsListable;

class CurlRequestComponent extends RequestComponent implements CurlComponentInterface
{
    use PublicMethodsListable;

    public function progressBar(): self
    {
        $this['progress'] = true;

        return $this;
    }
}
