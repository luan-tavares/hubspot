<?php

namespace LTL\Hubspot\Core\Request\Services;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Services\Curl\Curl;

class CurlRequestService
{
    private array|null $body;

    private array $header;

    private string $uri;

    private string $method;

    private Curl $curl;

    private array $curlParams;

    public function __construct(private ResourceInterface $resource, string $url, string $method)
    {
        $request = RequestContainer::get($resource);
    
        $this->body = $request->getBody();
        $this->header = $request->getHeaders();
        $this->curlParams = $request->getCurlParams();
        $this->uri = $this->getEncodedUri($request, $url);
        $this->method = $method;
    }

    public function connect(): Curl
    {
        $this->curl = new Curl($this->uri);
        $this->curl->header($this->header);

        if (@$this->curlParams['progress']) {
            $this->curl->withProgress();
        }

        return $this->curl->connect($this->method, $this->body);
    }

    private function getEncodedUri(RequestInterface $request, string $url): string
    {
        $encodedQueries = http_build_query($request->getQueries());

        return $url .'?'. preg_replace('/%5B[0-9]+%5D/i', '', $encodedQueries);
    }
}
