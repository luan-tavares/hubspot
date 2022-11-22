<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Interfaces\Request\UriComponentInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Exceptions\HubspotApiException;

class UriRequestComponent extends RequestComponent implements UriComponentInterface
{
    private string $uri;

    public function create(ActionSchemaInterface $actionSchema, array $arguments): void
    {
        $params = $actionSchema->params ?? [];
        $queryArguments = $arguments;
        $nParams = count($params);
        $nArguments = count($arguments);

        if ($nParams !== $nArguments) {
            throw new HubspotApiException(
                '"'. $actionSchema->resourceClass ."::{$actionSchema}()\" must be {$nParams} params, {$nArguments} given"
            );
        }

        if (!$actionSchema->authentication) {
            $this->request->removeApikey();
        }

        if ($actionSchema->hasBody) {
            array_pop($queryArguments);
        }
        
        $url = str_replace(
            $params,
            $queryArguments,
            $actionSchema->baseUri
        );

        $encodedQueries = preg_replace('/%5B[0-9]+%5D/i', '', http_build_query($this->request->getQueries()));

        $this->uri = "{$url}?{$encodedQueries}";
    }

    public function get(): string
    {
        return $this->uri;
    }
}