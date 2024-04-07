<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class ObjectIteratorProperty extends ActionProperty
{
    protected function parse(object $actionSchema): string|null
    {
        if (isset($actionSchema->objectIterator)) {
            return 'LTL\\Hubspot\\Objects\\'. $actionSchema->objectIterator;
        }
       
        return null;
    }
}
