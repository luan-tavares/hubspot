<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class ResourceClassActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): string
    {
        return $actionSchema->resourceClass;
    }
}
