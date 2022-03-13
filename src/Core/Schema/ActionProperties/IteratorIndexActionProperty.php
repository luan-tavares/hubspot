<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class IteratorIndexActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema, ResourceSchemaInterface|null $schema = null): string|null
    {
        return @$actionSchema->iteratorIndex;
    }
}
