<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Request\RequestArguments;

abstract class RequestHeaders
{
    public static function get(RequestInterface $request, RequestArguments $requestArguments): array
    {
        $request->addBaseHeader($requestArguments);
       
        return $request->getHeaders();
    }
}
