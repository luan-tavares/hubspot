<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\HeaderInterface;
use LTL\Hubspot\Core\Traits\MethodsListable;

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
        $this->notify('oAuthInserted');
        
        return $this->header('Authorization', "Bearer {$oAuth}");
    }

    public function contentType(string $contentType): self
    {
        return $this->header('Content-Type', $contentType);
    }
}
