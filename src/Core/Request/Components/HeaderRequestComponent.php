<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Globals\OAuthGlobal;
use LTL\Hubspot\Core\Interfaces\Request\HeaderComponentInterface;
use LTL\Hubspot\Core\Request\Components\AbstractRequestComponent;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class HeaderRequestComponent extends AbstractRequestComponent implements HeaderComponentInterface
{
    use PublicMethodsListable;

    protected function register(): void
    {
        $oAuth = OAuthGlobal::get();

        if (!is_null($oAuth)) {
            $this->oAuth($oAuth);
        }
    }

    public function oAuth(string $oAuth): self
    {
        $this->request->removeApikey();
        
        return $this->addNotNull('Authorization', "Bearer {$oAuth}");
    }
}
