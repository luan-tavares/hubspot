<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;
use LTL\Hubspot\Services\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface CurlComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    public function progressBar(): self;
}
