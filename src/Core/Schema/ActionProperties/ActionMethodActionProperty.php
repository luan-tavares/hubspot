<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class ActionMethodActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): string
    {
        return $actionSchema->action;
    }
}
