<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class AuthenticationActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): bool
    {
        return $actionSchema->authentication ?? $actionSchema->schemaHasAuthentication;
    }
}
