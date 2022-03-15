<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class BaseQueryActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): mixed
    {
        if (!isset($actionSchema->queries)) {
            return null;
        }

        return (array) $actionSchema->queries;
    }
}
