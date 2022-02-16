<?php

namespace LTL\Hubspot\Services\Curl;

use CurlHandle;
use LTL\Hubspot\Services\Curl\CurlConstants;
use LTL\Hubspot\Services\Curl\CurlResponseHeader;

class Curl
{
    private array $params = [];

    private array $requestHeaders = [];

    private CurlHandle $curl;
   
    private CurlResponseHeader $responseHeader;

    private string|null $responseBody;

    private int $status;

    public function __construct(private string $uri)
    {
        foreach (CurlConstants::CURL_PARAMS as $index => $value) {
            $this->params[$index] = $value;
        }

        $this->params[CURLOPT_URL] = $this->uri;
    }


    public function connect(string $method, array|null $body = null): self
    {
        $this->curl = curl_init();
     
        $this->resolveHeader()
            ->resolveBody($body)
            ->resolveMethod($method);

        foreach ($this->params as $index => $value) {
            curl_setopt($this->curl, $index, $value);
        }
        
        $fullResponse = curl_exec($this->curl);

        $this->status = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        $this->responseBody = $this->makeResponseBody($fullResponse);
        $this->responseHeader = $this->makeResponseHeader($fullResponse);
       
        curl_reset($this->curl);

        curl_close($this->curl);
  
        return $this;
    }

    public function addParams(array $params): self
    {
        foreach ($params as $param => $value) {
            $this->params[$param] = $value;
        }

        return $this;
    }

    public function addHeaders(array $headers): self
    {
        $this->requestHeaders = $headers;

        return $this;
    }

    private function makeResponseBody(string $fullResponse): string
    {
        if (!@$this->params[CURLOPT_HEADER]) {
            return $fullResponse;
        }

        $headerSize = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);

        return substr($fullResponse, $headerSize);
    }

    private function makeResponseHeader(string $fullResponse): CurlResponseHeader
    {
        if (!@$this->params[CURLOPT_HEADER]) {
            return new CurlResponseHeader;
        }

        $headerSize = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);

        return new CurlResponseHeader(substr($fullResponse, 0, $headerSize));
    }

   

    private function resolveBody(array|null $body): self
    {
        if (!$body || empty($body)) {
            unset($this->params[CURLOPT_POSTFIELDS]);

            return $this;
        }

        if (@$this->requestHeaders['Content-Type'] === 'multipart/form-data') {
            $this->params[CURLOPT_POSTFIELDS] = $body;

            return $this;
        }

        if (@$this->requestHeaders['Content-Type'] === 'application/x-www-form-urlencoded') {
            $this->params[CURLOPT_POSTFIELDS] = http_build_query($body);

            return $this;
        }

        $this->params[CURLOPT_POSTFIELDS] = json_encode($body, CurlConstants::JSON_ENCODE);

        return $this;
    }
  
    private function resolveHeader(): self
    {
        if (empty($this->requestHeaders)) {
            return $this;
        }

        $requestHeaders = [];
        foreach ($this->requestHeaders as $name => $value) {
            $name = (is_int($name))?(''):("{$name}: ");
            $requestHeaders[] = "{$name}{$value}";
        }
        $this->params[CURLOPT_HTTPHEADER] = $requestHeaders;

        return $this;
    }

    private function resolveMethod(string $method): self
    {
        $this->params[CURLOPT_CUSTOMREQUEST] = $method;

        return $this;
    }

    public function getResponse(): string|null
    {
        return (!empty($this->responseBody)) ? $this->responseBody : null;
    }

    public function getHeaders(): array|null
    {
        return $this->responseHeader->get() ?? null;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function hasError(): int
    {
        return ($this->status < 200 || $this->status > 299);
    }

    public function getUri(): string
    {
        return $this->uri;
    }
}
