<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Interfaces\Request\UriComponentInterface;
use LTL\Hubspot\Core\Request\Components\AbstractRequestComponent;
use LTL\Hubspot\Core\Request\RequestArguments;

class UriRequestComponent extends AbstractRequestComponent implements UriComponentInterface
{
    private string $uri;

    protected function register(): void
    {
    }

    public function create(RequestArguments $requestArguments): void
    {
        if ($requestArguments->notHasAuth()) {
            $this->request->removeApikey();
        }
        
        $this->request->addQueriesBefore($requestArguments->baseQuery());
        $this->request->addQueriesBefore($requestArguments->queriesAsParams());

        $url = $requestArguments->baseURi();

        if(!is_null($params = $requestArguments->params())) {
            $url = str_replace(array_keys($params), $params, $url);
        }
        
        $encodedQueries = preg_replace('/%5B[0-9]+%5D/i', '', http_build_query($this->request->getQueries()));

        $this->uri = "{$url}?{$encodedQueries}";
    }

    public function get(): string
    {
        return $this->uri;
    }
}
