<?php

namespace LTL\Hubspot\Services\Curl;

use LTL\Hubspot\Core\Request\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Core\Request\Response;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;

class Curl
{
    private array $params = [];

    private string $uri;

    public function __construct(private Request $request)
    {
        $this->params = CurlConstants::CURL_PARAMS;

        $this->resolveHeader()
            ->resolveBody()
            ->resolveUri()
            ->resolveAction()
            ->resolveOtherParams();
    }

    /**
     * Execute de Curl Request
     *
     * @return ResponseInterface
     */
    public function connect(): ResponseInterface
    {
        $request = curl_init($this->uri);

  
        foreach ($this->params as $index => $value) {
            curl_setopt($request, $index, $value);
        }

        $response = curl_exec($request);

        $status = curl_getinfo($request, CURLINFO_HTTP_CODE);

        curl_close($request);
  
        return new Response($response, $status, $this->request->getAction());
    }

    private function resolveOtherParams(): self
    {
        $curlParams = $this->request->getCurlParams();

        if (@$curlParams['progress']) {
            $this->params[CURLOPT_NOPROGRESS] = false;
            $this->params[CURLOPT_PROGRESSFUNCTION] = CurlProgressBar::class .'::progress';
        }


        return $this;
    }

    private function resolveBody(): self
    {
        $body = $this->request->getBody();
     

        if (!$body) {
            unset($this->params[CURLOPT_POSTFIELDS]);

            return $this;
        }

        $contentType = $this->request->getHeader('Content-Type');

        if (is_array($body) && !($contentType === 'multipart/form-data')) {
            $body = json_encode($body, CurlConstants::JSON_ENCODE);
        }
        $this->params[CURLOPT_POSTFIELDS] = $body;

        return $this;
    }
  
    private function resolveHeader(): self
    {
        $headers = $this->request->getHeaders();

        $resolveHeader = [];
        foreach ($headers as $name => $value) {
            $resolveHeader[] = "{$name}: {$value}";
        }
        $this->params[CURLOPT_HTTPHEADER] = $resolveHeader;

        return $this;
    }

    private function resolveAction(): self
    {
        $this->params[CURLOPT_CUSTOMREQUEST] = $this->request->getMethod();

        return $this;
    }

    private function resolveUri(): self
    {
        $this->uri = $this->request->getUri() .'?'. $this->setUriQuery();

        return $this;
    }

    private function setUriQuery(): string
    {
        $queries = $this->request->getQueries();

        $query = http_build_query($queries);

        return preg_replace('/%5B[0-9]+%5D/i', '', $query);
    }
}
