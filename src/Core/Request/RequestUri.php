<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Request\Interfaces\RequestArgumentsInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;

abstract class RequestUri
{
    public static function get(RequestInterface $request, RequestArgumentsInterface $requestArguments): string
    {
        $request->addUriArguments($requestArguments);

        if ($requestArguments->notHasAuthentication()) {
            $request->removeApikey();
        }

        $url = $requestArguments->baseUri();

        if(!is_null($params = $requestArguments->params())) {
            $url = str_replace(array_keys($params), $params, $url);
        }

        if(empty($queries = $request->getQueries())) {
            return $url;
        }
        
        $encodedQueries = preg_replace('/%5B[0-9]+%5D/i', '', http_build_query($queries));

        return "{$url}?{$encodedQueries}";
    }
}
