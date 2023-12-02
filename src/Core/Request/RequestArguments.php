<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Request\Interfaces\RequestArgumentsInterface;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\HubspotRequestBody\Core\AbstractBody;

class RequestArguments implements RequestArgumentsInterface
{
    private array $params = [];

    private array $queriesAsParam = [];

    private array|AbstractBody|null $body = null;
    
    public function __construct(private ActionSchemaInterface $actionSchema, array $arguments = [])
    {

        $nArguments = count($arguments);

        $params = $this->actionSchema->params ?? [];
        $queryParams = $this->actionSchema->queryAsParam ?? [];

        $hasBody = $this->actionSchema->hasBody;
        
        $total = count($queryParams) + count($params) + $hasBody;

        if ($total !== $nArguments) {
            throw new HubspotApiException(
                '"'. $this->actionSchema->resourceClass ."::{$this->actionSchema}(...)\" must be {$total} params, {$nArguments} given"
            );
        }

        $reverseArguments = array_reverse($arguments);

        foreach ($params as $name) {
            $this->params[$name] = array_pop($reverseArguments);
        }
        
        foreach ($queryParams as $name) {
            $this->queriesAsParam[$name] = array_pop($reverseArguments);
        }

        if($hasBody) {
            $this->body = $this->resolveBody($reverseArguments);
        }
    }

    private function resolveBody(array $reverseArguments): array
    {
        $body = current($reverseArguments);

        if(is_array($body)) {
            return $body;
        }

        if($body instanceof AbstractBody) {
            if(in_array($body::class, $this->actionSchema->bodyTypes)) {
                return $body->get();
            }
        }

        $method = '"'. $this->actionSchema->resourceClass ."::{$this->actionSchema}(...)\"";
        $types = implode('|', $this->actionSchema->bodyTypes);

        throw new HubspotApiException("{$method} \$requestBody must be {$types}.");
    }

    public function body(): array|null
    {
        return $this->body;
    }

    public function params(): array|null
    {
        return $this->params;
    }

    public function queriesAsParams(): array|null
    {
        return $this->queriesAsParam;
    }

    public function baseUri(): string
    {
        return $this->actionSchema->baseUri;
    }

    public function notHasAuthentication(): bool
    {
        return !$this->actionSchema->authentication;
    }

    public function baseQuery(): array|null
    {
        return $this->actionSchema->baseQuery;
    }

    public function getMethod(): string
    {
        return $this->actionSchema->method;
    }

    public function baseHeader(): array|null
    {
        return $this->actionSchema->baseHeader;
    }
}
