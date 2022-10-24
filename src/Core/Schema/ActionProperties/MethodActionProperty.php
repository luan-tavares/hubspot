<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class MethodActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): string
    {
        if (isset($actionSchema->handler)) {
            return '';
        }

        return $actionSchema->method;
    }
}