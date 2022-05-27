<?php
 
namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Curl\Interfaces\CurlInterface;

interface RequestDefinitionInterface
{
    public function connect(CurlInterface|null $curl = null): CurlInterface;
}
