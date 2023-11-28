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
    
    public function __construct(ActionSchemaInterface $actionSchema, array $arguments)
    {
        $nArguments = count($arguments);

        $params = $actionSchema->params ?? [];
        $queryParams = $actionSchema->queryAsParam ?? [];

        $hasBody = $actionSchema->hasBody;
        
        $total = count($queryParams) + count($params) + ((int) $hasBody);

        if ($total !== $nArguments) {
            throw new HubspotApiException(
                '"'. $actionSchema->resourceClass ."::{$actionSchema}(...)\" must be {$total} params, {$nArguments} given"
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
            $this->requestBody = $this->resolveRequestBody($actionSchema, $reverseArguments);
        }
    }

    private function resolveRequestBody(ActionSchemaInterface $actionSchema, array $reverseArguments): array
    {
        $requestBody = current($reverseArguments);

        if($requestBody instanceof BaseBodyBuilder) {
            return $requestBody->get();
        }

        if(is_array($requestBody)) {
            return $requestBody;
        }

        throw new HubspotApiException(
            '"'. $actionSchema->resourceClass ."::{$actionSchema}()\" request body (last param) must be array or Body Object, ". gettype($requestBody) .' given'
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
}
