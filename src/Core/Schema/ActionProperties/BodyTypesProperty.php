<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class BodyTypesProperty extends ActionProperty
{
    protected function parse(object $actionSchema): array|null
    {
        if (isset($actionSchema->handler)) {
            return null;
        }

        if (!in_array($actionSchema->method, HubspotConfig::METHODS_WITH_BODY)) {
            return null;
        }

        $hasBody = $actionSchema->hasBody ?? true;

        if(!$hasBody) {
            return null;
        }

        $body = ['array'];

        if(!is_null($bodyBuilder = @$actionSchema->bodyBuilder)) {
            $body[] = "LTL\\HubspotRequestBody\\Resources\\{$bodyBuilder}";
        }

        return $body;
        
    }
}
