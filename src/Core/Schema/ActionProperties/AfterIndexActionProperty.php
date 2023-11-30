<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;
use LTL\Hubspot\Core\Schema\Interfaces\ResourceSchemaInterface;

class AfterIndexActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): string|null
    {
        return $actionSchema->afterIndex ?? null;
    }
}
