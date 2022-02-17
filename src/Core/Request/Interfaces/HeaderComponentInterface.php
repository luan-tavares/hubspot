<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;
use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface HeaderComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    public function oAuth(string $oAuth): self;
}
