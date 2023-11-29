<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Globals\TimesleepGlobal;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Request\RequestConnectionInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;

abstract class RequestConnection implements RequestConnectionInterface
{
    public static function handle(
        RequestInterface $request,
        RequestArguments $requestArguments,
        CurlInterface|null $curl = null
    ): CurlInterface {
        if (is_null($curl)) {
            $curl = new Curl;
        }

        $headers = RequestHeaders::get($request, $requestArguments);
        
        $uri = RequestUri::get($request, $requestArguments);

        $curlParams = $request->getCurlParams();

        $curl =  $curl->addUri($uri)->addHeaders($headers)->addParams($curlParams);

        $curl = self::recursiveCurl($request, $requestArguments, $curl);

        if ($curl->error() && $request->hasExceptionIfRequestError()) {
            $response = empty($curl->response())?'"NO RESPONSE"':$curl->response();

            throw new HubspotApiException("Error {$curl->status()} :: {$response}");
        }
        
        return $curl;
    }

    private static function recursiveCurl(
        RequestInterface $request,
        RequestArguments $requestArguments,
        CurlInterface $curl,
        int $current = 1
    ): CurlInterface {
        $tooManyRequestsTries = $request->getTooManyRequestsTries();
        
        $curlResponse = $curl->request($requestArguments->method(), $requestArguments->body());

        if (is_null($tooManyRequestsTries)) {
            return $curlResponse;
        }
 
        if ($curlResponse->status() !== HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE) {
            return $curlResponse;
        }

        if ($current >= $tooManyRequestsTries) {
            return $curlResponse;
        }

        sleep(TimesleepGlobal::get());

        return self::recursiveCurl($request, $requestArguments, $curl, ++$current);
    }
}
