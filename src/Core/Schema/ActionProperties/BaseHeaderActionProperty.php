<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class BaseHeaderActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema, ResourceSchemaInterface|null $schema = null): array|null
    {
        $headers = (array) @$actionSchema->headers;
        
        $hasBody = (in_array($actionSchema->method, HubspotConfig::METHODS_WITH_BODY) && !@$actionSchema->noBody);
        
        if ($hasBody) {
            $headers['Content-Type'] = @$actionSchema->headers->{'Content-Type'} ?? HubspotConfig::DEFAULT_CONTENT_TYPE;
        }

        if (empty($headers)) {
            return null;
        }

        return $headers;
    }
}
