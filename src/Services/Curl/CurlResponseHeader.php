<?php

namespace LTL\Hubspot\Services\Curl;

class CurlResponseHeader
{
    private array|null $headers = null;

    public function __construct(string|null $headers = null)
    {
        if (!is_null($headers)) {
            $this->headers = $this->toArray($headers);
        }
    }

    private function toArray(string $headers): array
    {
        $result = [];
        $headers = explode("\r\n", $headers);
        
        foreach ($headers as $header) {
            $split = explode(': ', $header);

            if (count($split) === 2) {
                $result[$split[0]] = $split[1];
            }
        }

        return $result;
    }

    public function get(): array|null
    {
        return $this->headers;
    }
}
