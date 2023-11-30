<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Request\Interfaces\RequestArgumentsInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;

abstract class RequestHeaders
{
    public static function get(RequestInterface $request, RequestArgumentsInterface $requestArguments): array
    {
        $request->addBaseHeader($requestArguments);
       
        return $request->getHeaders();
    }
}
