<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Globals\TimesleepGlobal;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Request\RequestDefinitionInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;

class RequestDefinition implements RequestDefinitionInterface
{
    public function __construct(private RequestInterface $request, ActionSchemaInterface $actionSchema, array $arguments)
    {
        $this->request->addHeadersBefore($actionSchema->baseHeader);
        $this->request->addQueriesBefore($actionSchema->baseQuery);
        $this->request->addMethod($actionSchema->method);
        $this->request->addBody($actionSchema, $arguments);
        $this->request->addUri($actionSchema, $arguments);
    }

    public function connect(CurlInterface|null $curl = null): CurlInterface
    {
        if (is_null($curl)) {
            $curl = new Curl;
        }

        $curl =  $curl->addUri($this->request->getUri())
            ->addHeaders($this->request->getHeaders())
            ->addParams($this->request->getCurlParams());
        
        $tooManyRequestsTries = $this->request->getTooManyRequestsTries();

        $curl = $this->recursiveCurl($curl, $tooManyRequestsTries);

        if ($curl->error() && $this->request->hasExceptionIfRequestError()) {
            $response = empty($curl->response())?'"NO RESPONSE"':$curl->response();

            throw new HubspotApiException("Error {$curl->status()} :: {$response}");
        }
        
        return $curl;
    }

    private function recursiveCurl(CurlInterface $curl, int|null $tooManyRequestsTries, int $current = 1): CurlInterface
    {
        $curlResponse =  $curl->request($this->request->getMethod(), $this->request->getBody());

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

        $current++;

        return $this->recursiveCurl($curl, $tooManyRequestsTries, $current);
    }
}
