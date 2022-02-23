<?php
 
namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;
use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface HeaderComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    public function oAuth(string $oAuth): self;
}
