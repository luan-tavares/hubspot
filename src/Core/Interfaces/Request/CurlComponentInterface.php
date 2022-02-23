<?php
 
namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;
use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface CurlComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    public function withProgressBar(): self;
    public function withResponseHeaders(): self;
}
