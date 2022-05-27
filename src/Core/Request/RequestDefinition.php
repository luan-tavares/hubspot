<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestDefinitionInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;

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

        return $curl->addUri($this->request->getUri())
            ->addHeaders($this->request->getHeaders())
            ->addParams($this->request->getCurlParams())
            ->connect($this->request->getMethod(), $this->request->getBody());
    }
}
