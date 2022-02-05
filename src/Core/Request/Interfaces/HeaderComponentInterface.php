<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;
use LTL\Hubspot\Services\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface HeaderComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    public function header(string $name, string $value): self;
    public function oAuth(string $oAuth): self;
    public function contentType(string $contentType): self;
}