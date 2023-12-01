<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;
use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface CurlComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    public function withProgressBar(): self;
    public function withHeaders(): self;
}
