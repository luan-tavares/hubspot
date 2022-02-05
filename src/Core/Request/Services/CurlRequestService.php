<?php

namespace LTL\Hubspot\Core\Request\Services;

use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Services\Curl\Curl;
use stdClass;

class CurlRequestService
{
    private ?array $body;

    private array $header;

    private string $uri;

    private string $method;

    private Curl $curl;

    private array $curlParams;

    public function __construct(private RequestInterface $request)
    {
        $this->body = $this->request->getBody();
        $this->header = $this->request->getHeaders();
        $this->uri = $this->request->getUri() .'?'. $this->getEncodedUri();
        $this->method = $this->request->getMethod();
        $this->curlParams = $this->request->getCurlChanges();
       
        $this->curl = new Curl($this->uri);
        $this->curl->header($this->header);
    }

    public function connect(): Curl
    {
        if (@$this->curlParams['progress']) {
            $this->curl->withProgress();
        }

        return $this->curl->connect($this->method, $this->body);
    }

    private function getEncodedUri(): string
    {
        $queries = $this->request->getQueries();

        $query = http_build_query($queries);

        return preg_replace('/%5B[0-9]+%5D/i', '', $query);
    }
}
