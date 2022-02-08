<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\UriComponentInterface;

class UriRequestComponent extends RequestComponent implements UriComponentInterface
{
    private string $uri;

    public function generate(string $baseUri, array $associativeParams, array $queries): void
    {
        $url = str_replace(
            array_keys($associativeParams),
            array_values($associativeParams),
            $baseUri
        );

        $encodedQueries = preg_replace('/%5B[0-9]+%5D/i', '', http_build_query($queries));

        $this->uri = "{$url}?{$encodedQueries}";
    }

    public function get(): string
    {
        return $this->uri;
    }
}
