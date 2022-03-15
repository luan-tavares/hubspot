<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class DocumentationActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): string
    {
        return $actionSchema->documentation ?? $actionSchema->schemaDocumentation;
    }
}
