<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\HeaderComponentInterface;
use LTL\Hubspot\Services\PublicMethods\Traits\PublicMethodsListable;

class HeaderRequestComponent extends RequestComponent implements HeaderComponentInterface
{
    use PublicMethodsListable;

    public function oAuth(string $oAuth): self
    {
        $this->notify('oAuthInserted');
        
        return $this->add('Authorization', "Bearer {$oAuth}");
    }
}
