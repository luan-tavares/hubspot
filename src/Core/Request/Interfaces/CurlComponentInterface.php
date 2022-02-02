<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Interfaces\MethodsListableInterface;
use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;

interface CurlComponentInterface extends ComponentInterface, MethodsListableInterface
{
    public function progressBar(): self;
}
