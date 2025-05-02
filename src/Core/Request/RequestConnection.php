<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Curl\Curl;
use LTL\Curl\CurlException;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Globals\TimesleepGlobal;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Request\Interfaces\RequestArgumentsInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestConnectionInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Exceptions\HubspotClientTimeoutException;

abstract class RequestConnection implements RequestConnectionInterface
{
    public static function handle(
        RequestInterface $request,
        RequestArgumentsInterface $requestArguments,
        CurlInterface|null $curl = null
    ): CurlInterface {
        if (is_null($curl)) {
            $curl = new Curl;
        }

        $headers = RequestHeaders::get($request, $requestArguments);

        $uri = RequestUri::get($request, $requestArguments);

        $curlParams = $request->getCurlParams();

        $curl->addUri($uri)->addHeaders($headers)->addParams($curlParams);

        try {
            $curl = self::recursiveCurl($request, $requestArguments, $curl);
        } catch (CurlException $exception) {
            if ($exception->getCode() === CURLE_OPERATION_TIMEDOUT) {
                throw new HubspotClientTimeoutException("Client Timeout: {$request->getClientTimeout()} seconds.");
            }
            throw new HubspotApiException($exception->getMessage());
        }

        if ($curl->error() && $request->hasWithRequestException()) {
            $response = empty($curl->response()) ? '"NO RESPONSE"' : $curl->response();

            throw new HubspotApiException("Error {$curl->status()} :: {$response}");
        }

        return $curl;
    }

    private static function recursiveCurl(
        RequestInterface $request,
        RequestArgumentsInterface $requestArguments,
        CurlInterface $curl,
        int $current = 1
    ): CurlInterface {
        $requestTries = $request->getRequestsTries();

        $curlResponse = $curl->request($requestArguments->getMethod(), $requestArguments->body());

        if (!in_array($curlResponse->status(), HubspotConfig::TRY_AGAIN_STATUS_LIST)) {
            return $curlResponse;
        }

        if ($current === $requestTries) {
            return $curlResponse;
        }

        sleep(TimesleepGlobal::get());

        return self::recursiveCurl($request, $requestArguments, $curl, ++$current);
    }
}
