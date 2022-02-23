<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;

class RequestCurlCaller
{
    private array $body;

    private array $header;

    private string $uri;

    private string $method;
    
    private array $curlParams;

    public function __construct(RequestInterface $request, string $method)
    {
        $this->body = $request->getBody();
        $this->header = $request->getHeaders();
        $this->curlParams = $request->getCurlParams();
        $this->uri = $request->getUri();
        $this->method = $method;
    }

    public function connect(): CurlInterface
    {
        return (new Curl($this->uri))
            ->addHeaders($this->header)
            ->addParams($this->curlParams)
            ->connect($this->method, $this->body);
    }
}
