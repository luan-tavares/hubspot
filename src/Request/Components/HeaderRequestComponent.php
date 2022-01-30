<?php

namespace LTL\HubspotApi\Request\Components;

use LTL\HubspotApi\Request\Components\RequestComponent;
use LTL\HubspotApi\Request\Interfaces\HeaderInterface;
use LTL\HubspotApi\Traits\MethodsListable;

class HeaderRequestComponent extends RequestComponent implements HeaderInterface
{
    use MethodsListable;

    public function header(string $name, string $value): self
    {
        $this[$name] = $value;

        return $this;
    }

    public function oAuth(string $oAuth): self
    {
        $this->notify('removeApikey');
        
        return $this->header('Authorization', "Bearer {$oAuth}");
    }
}
