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
use LTL\Hubspot\Exceptions\HubspotCurlException;
use LTL\Hubspot\Exceptions\HubspotCurlRecvException;
use LTL\Hubspot\Exceptions\PropertyCoordinatesHubspotApiException;

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
            $code = $exception->getCode();
            $message = $exception->getMessage();

            if ($code === CURLE_OPERATION_TIMEDOUT) {
                throw new HubspotClientTimeoutException("Client Timeout: {$request->getClientTimeout()} seconds.", $code);
            }
            if ($code === CURLE_RECV_ERROR) {
                throw new HubspotCurlRecvException($message, $code);
            }
            throw new HubspotCurlException($message, $code);
        }

        if ($curl->error() && $request->hasWithRequestException()) {

            // Regex para capturar name, value, target e exists
            $regex = '/PropertyValueCoordinates\{.*?propertyName=(.*?), value=\[(.*?)\].*?\} on (\d+)\. (\d+) already has that value\./';

            if (preg_match($regex, $curl->response(), $matches)) {
                $resultado = [
                    'name' => $matches[1],
                    'value' => $matches[2],
                    'target' => $matches[3],
                    'exists' => $matches[4],
                ];

                throw new PropertyCoordinatesHubspotApiException(json_encode($resultado));
            }
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
