<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class HasBodyActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): bool
    {
        if (isset($actionSchema->handler)) {
            return false;
        }

        if (!in_array($actionSchema->method, HubspotConfig::METHODS_WITH_BODY)) {
            return false;
        }

        return $actionSchema->hasBody ?? true;
    }
}