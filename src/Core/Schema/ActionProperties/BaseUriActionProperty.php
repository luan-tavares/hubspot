<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class BaseUriActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): string
    {
        if (isset($actionSchema->handler)) {
            return '';
        }

        $uri = HubspotConfig::BASE_URL ?? 'https://api.hubspot.com';


        if (!isset($actionSchema->absolutePath)) {
            $uri .= "/{$actionSchema->resource}/v{$actionSchema->version}";
        }

        return "{$uri}/{$actionSchema->path}";
    }
}