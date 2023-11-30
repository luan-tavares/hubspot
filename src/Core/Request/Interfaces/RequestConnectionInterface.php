<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestArgumentsInterface;

interface RequestConnectionInterface
{
    public static function handle(RequestInterface $request, RequestArgumentsInterface $requestArguments): CurlInterface;
}
