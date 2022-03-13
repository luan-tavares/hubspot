<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class AuthenticationActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema, ResourceSchemaInterface|null $schema = null): bool
    {
        $authentication = $schema->authentication;

        if (isset($actionSchema->authentication)) {
            $authentication = $actionSchema->authentication;
        }

        return $authentication;
    }
}
