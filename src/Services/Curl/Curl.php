<?php

namespace LTL\Hubspot\Services\Curl;

use LTL\Hubspot\Services\Curl\CurlConstants;

class Curl
{
    private array $params = [];

    private array $headers = [];

    private $curl;

    private ?string $response;

    private int $status;

    public function __construct(private string $uri)
    {
    }

    public function header(string|array $haystack, int|string $value = null): self
    {
        if (is_array($haystack)) {
            $this->headers = array_merge($this->headers, $haystack);

            return $this;
        }

        $this->headers[$haystack] = $value;

        return $this;
    }

    public function get(): self
    {
        return $this->connect('GET');
    }

    public function delete(): self
    {
        return $this->connect('DELETE');
    }

    public function put(array $body): self
    {
        return $this->connect('PUT', $body);
    }

    public function patch(array $body): self
    {
        return $this->connect('PATCH', $body);
    }

    public function post(array $body): self
    {
        return $this->connect('POST', $body);
    }

    public function connect(string $method, ?array $body = null): self
    {
        $this->curl = curl_init();

        foreach (CurlConstants::CURL_PARAMS as $index => $value) {
            curl_setopt($this->curl, $index, $value);
        }
        $this->resolveHeader()
            ->resolveBody($body)
            ->resolveMethod($method)
            ->resolveUri();

        foreach ($this->params as $index => $value) {
            curl_setopt($this->curl, $index, $value);
        }

        $this->response = curl_exec($this->curl);
      
    
        $this->status = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

        curl_reset($this->curl);

        curl_close($this->curl);
  
        return $this;
    }

    public function removeLeak(): void
    {
        $this->response = null;
    }

    public function withProgress(): self
    {
        $this->params[CURLOPT_NOPROGRESS] = false;
        $this->params[CURLOPT_PROGRESSFUNCTION] = CurlProgressBar::class .'::progress';

        return $this;
    }

    private function resolveBody(?array $body): self
    {
        if (!$body) {
            unset($this->params[CURLOPT_POSTFIELDS]);

            return $this;
        }

        if (@$this->headers['Content-Type'] !== 'multipart/form-data') {
            $body = json_encode($body, CurlConstants::JSON_ENCODE);
        }
        $this->params[CURLOPT_POSTFIELDS] = $body;

        return $this;
    }
  
    private function resolveHeader(): self
    {
        $headers = $this->headers;

        if (count($headers) === 0) {
            return $this;
        }
        $resolveHeader = [];
        foreach ($headers as $name => $value) {
            $resolveHeader[] = "{$name}: {$value}";
        }
        $this->params[CURLOPT_HTTPHEADER] = $resolveHeader;

        return $this;
    }

    private function resolveMethod(string $method): self
    {
        $this->params[CURLOPT_CUSTOMREQUEST] = $method;

        return $this;
    }

    private function resolveUri(): self
    {
        $this->params[CURLOPT_URL] = $this->uri;

        return $this;
    }

    /**
     * Get the value of response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function getUri()
    {
        return $this->uri;
    }
}
