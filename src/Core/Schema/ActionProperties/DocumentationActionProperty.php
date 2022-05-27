<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class DocumentationActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): string
    {
        if (isset($actionSchema->documentation)) {
            return $actionSchema->documentation;
        }

        return $actionSchema->schemaDocumentation;
    }
}
