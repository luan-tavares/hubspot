<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class AfterIndexActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): string|null
    {
        return $actionSchema->afterIndex ?? null;
    }
}
