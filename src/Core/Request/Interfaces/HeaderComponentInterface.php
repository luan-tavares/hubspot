<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;
use LTL\Hubspot\Services\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface HeaderComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    public function oAuth(string $oAuth): self;
}
