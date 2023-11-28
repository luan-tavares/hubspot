<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class QueryAsParamProperty extends ActionProperty
{
    protected function parse(object $actionSchema): array|null
    {
        if (isset($actionSchema->handler)) {
            return null;
        }
        
        $arguments = [];

        if(!is_null($queryAsParam = @$actionSchema->queryAsParam)) {
            foreach ($queryAsParam as $query => $param) {
                $arguments[] = $query;
            }
        }

        if (empty($arguments)) {
            return null;
        }

        return $arguments;
    }
}
