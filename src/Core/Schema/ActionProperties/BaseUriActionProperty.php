<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class BaseUriActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema, ResourceSchemaInterface|null $schema = null): string
    {
        $uri = HubspotConfig::BASE_URL;

        if (!@$actionSchema->absolutePath) {
            $uri .= "/{$schema->resource}/v{$schema->version}";
        }

        return "{$uri}/{$actionSchema->path}";
    }
}
