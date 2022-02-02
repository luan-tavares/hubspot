<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\HeaderComponentInterface;
use LTL\Hubspot\Core\Traits\MethodsListable;

class HeaderRequestComponent extends RequestComponent implements HeaderComponentInterface
{
    use MethodsListable;

    public function header(string $name, ?string $value): self
    {
        if (!is_null($value)) {
            $this[$name] = $value;
        }

        return $this;
    }

    public function oAuth(string $oAuth): self
    {
        $this->notify('oAuthInserted');
        
        return $this->header('Authorization', "Bearer {$oAuth}");
    }

    public function contentType(?string $contentType): self
    {
        return $this->header('Content-Type', $contentType);
    }
}
