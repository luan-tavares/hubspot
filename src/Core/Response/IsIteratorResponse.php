<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Core\Schema\ActionSchema;

abstract class IsIteratorResponse
{
    public static function get(ActionSchema $actionSchema, object|array|null $objectResponse): bool
    {
        if (is_null($iteratorIndex = $actionSchema->iteratorIndex)) {
            return false;
        }
        
        return !is_null(@$objectResponse->{$iteratorIndex});
    }
}
