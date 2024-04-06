<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Request\Interfaces\RequestArgumentsInterface;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\HubspotRequestBody\Core\AbstractBody;

class RequestArguments implements RequestArgumentsInterface
{
    private array $params = [];

    private array $queriesAsParam = [];

    private array|AbstractBody|null $body = null;
    
    public function __construct(private ActionSchema $actionSchema, array $arguments = [])
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
            $item = array_pop($reverseArguments);
            $this->verifyQueryType($item, $name);
            $this->params[$name] = $item;
        }
        
        foreach ($queryParams as $name) {
            $item = array_pop($reverseArguments);
            $this->verifyQueryType($item, $name);
            $this->queriesAsParam[$name] = $item;
        }

        if($hasBody) {
            $this->body = $this->resolveBody($reverseArguments);
        }
    }

    private function verifyQueryType(mixed $value, string $name): void
    {
        if(is_string($value) || is_integer($value)) {
            return;
        }

        $type = gettype($value);

        $action = $this->actionSchema->action;

        throw new HubspotApiException("MEthod {$action} param \"{$name}\" must be int|string, {$type} given");
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
        
        $types = implode('|', $this->actionSchema->bodyTypes);

        $type = getType($body);

        $action = $this->actionSchema->action;

        throw new HubspotApiException("Method \"{$action}\" param \"requestBody\" must be {$types}, {$type} given");
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
