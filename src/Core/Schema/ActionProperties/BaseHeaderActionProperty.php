<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class BaseHeaderActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): array|null
    {
        if (isset($actionSchema->handler)) {
            return null;
        }

        $headers = (isset($actionSchema->headers))?((array) $actionSchema->headers):(null);

        if (!in_array($actionSchema->method, HubspotConfig::METHODS_WITH_BODY)) {
            return $headers;
        }

        $hasBody = $actionSchema->hasBody ?? true;
        
        if (!$hasBody) {
            return $headers;
        }

        if (is_null($headers)) {
            $headers = [];
        }
        
        $headers['Content-Type'] = $actionSchema->headers->{'Content-Type'} ?? HubspotConfig::DEFAULT_CONTENT_TYPE;

        return $headers;
    }
}