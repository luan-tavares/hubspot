<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Request\RequestArguments;

interface RequestConnectionInterface
{
    public static function handle(RequestInterface $request, RequestArguments $requestArguments): CurlInterface;
}
