<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class ObjectProperty extends ActionProperty
{
    protected function parse(object $actionSchema): string|null
    {
        if (isset($actionSchema->object)) {
            return 'LTL\\Hubspot\\Objects\\'. $actionSchema->object;
        }

        if(is_null($actionSchema->schemaObject)) {
            return null;
        }

        return 'LTL\\Hubspot\\Objects\\'. $actionSchema->schemaObject;
    }
}
