<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Interfaces\Request\HeaderComponentInterface;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class HeaderRequestComponent extends RequestComponent implements HeaderComponentInterface
{
    use PublicMethodsListable;

    public function oAuth(string $oAuth): self
    {
        $this->notify('oAuthInserted');
        
        return $this->addNotNull('Authorization', "Bearer {$oAuth}");
    }
}
