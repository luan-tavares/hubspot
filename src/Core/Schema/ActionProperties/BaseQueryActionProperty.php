<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;
use TypeError;

class BaseQueryActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): mixed
    {
        $queries = array_merge(
            $this->getBaseQuery($actionSchema),
            $this->getDefaultProperties($actionSchema)
        );

        if (count($queries) === 0) {
            return null;
        }

        return $queries;
    }

    private function getBaseQuery(object $actionSchema): array
    {
        if (!isset($actionSchema->queries)) {
            return [];
        }

        return (array) $actionSchema->queries;
    }

    private function getDefaultProperties(object $actionSchema): array
    {
        if (!@$actionSchema->withDefaultProperties) {
            return [];
        }

        if (is_null($actionSchema->defaultProperties)) {
            return [];
        }

        return [
            'properties' => implode(',', $actionSchema->defaultProperties)
        ];
    }
}
