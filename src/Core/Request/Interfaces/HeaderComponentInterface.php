<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Interfaces\MethodsListableInterface;
use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;

interface HeaderComponentInterface extends ComponentInterface, MethodsListableInterface
{
    public function header(string $name, string $value): self;
    public function oAuth(string $oAuth): self;
    public function contentType(string $contentType): self;
}
