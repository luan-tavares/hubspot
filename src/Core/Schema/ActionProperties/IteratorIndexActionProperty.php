<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class IteratorIndexActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): string|null
    {
        return $actionSchema->iteratorIndex ?? null;
    }
}
