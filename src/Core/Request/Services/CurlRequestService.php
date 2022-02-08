<?php

namespace LTL\Hubspot\Core\Request\Services;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Services\Curl\Curl;

class CurlRequestService
{
    private array $body;

    private array $header;

    private string $uri;

    private string $method;
    
    private array $curlParams;

    public function __construct(private ResourceInterface $resource, string $method)
    {
        $request = RequestContainer::get($resource);

        $this->body = $request->getBody();
        $this->header = $request->getHeaders();
        $this->curlParams = $request->getCurlParams();
        $this->uri = $request->getUri();
        $this->method = $method;
    }

    public function connect(): Curl
    {
        return (new Curl($this->uri))
            ->addHeaders($this->header)
            ->addParams($this->curlParams)
            ->connect($this->method, $this->body);
    }
}
