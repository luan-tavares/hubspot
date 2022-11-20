<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\HubspotOAuth;
use LTL\Hubspot\Core\Interfaces\Request\HeaderComponentInterface;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class HeaderRequestComponent extends RequestComponent implements HeaderComponentInterface
{
    use PublicMethodsListable;

    protected function initConfig(): void
    {
        $oAuth = HubspotOAuth::get();

        if (!is_null($oAuth)) {
            $this->oAuth($oAuth);
        }
    }

    public function oAuth(string $oAuth): self
    {
        $this->notify('oAuthInserted');
        
        return $this->addNotNull('Authorization', "Bearer {$oAuth}");
    }
}