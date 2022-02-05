<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;
use LTL\Hubspot\Services\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface HeaderComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    public function header(string $name, string|null $value): self;
    public function oAuth(string $oAuth): self;
    public function contentType(string|null $contentType): self;
    public function accept(string|null $accept): self;
}
