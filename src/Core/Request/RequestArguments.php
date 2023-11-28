<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;

class RequestArguments
{
    private array $params = [];

    private array $queriesAsParam = [];

    private array|BaseBodyBuilder|null $requestBody = null;
    
    public function __construct(private ActionSchemaInterface $actionSchema, array $arguments = [])
    {
        $nArguments = count($arguments);

        $params = $this->actionSchema->params ?? [];
        $queryParams = $this->actionSchema->queryAsParam ?? [];

        $hasBody = $this->actionSchema->hasBody;
        
        $total = count($queryParams) + count($params) + ((int) $hasBody);

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
            $this->requestBody = $this->resolveRequestBody($reverseArguments);
        }
    }

    private function resolveRequestBody(array $reverseArguments): array
    {
        $requestBody = current($reverseArguments);

        if($requestBody instanceof BaseBodyBuilder) {
            return $requestBody->get();
        }

        if(is_array($requestBody)) {
            return $requestBody;
        }

        throw new HubspotApiException(
            '"'. $this->actionSchema->resourceClass ."::{$this->actionSchema}(...)\" request body (last param) must be array or Body Object, ". gettype($requestBody) .' given'
        );
    }

    public function requestBody(): array|null
    {
        return $this->requestBody;
    }

    public function params(): array|null
    {
        return $this->params;
    }

    public function queriesAsParams(): array|null
    {
        return $this->queriesAsParam;
    }

    public function baseURi(): string
    {
        return $this->actionSchema->baseUri;
    }

    public function notHasAuth(): bool
    {
        return !$this->actionSchema->authentication;
    }

    public function baseQuery(): array|null
    {
        return $this->actionSchema->baseQuery;
    }

    public function method(): string
    {
        return $this->actionSchema->method;
    }

    public function baseHeader(): array|null
    {
        return $this->actionSchema->baseHeader;
    }
}
