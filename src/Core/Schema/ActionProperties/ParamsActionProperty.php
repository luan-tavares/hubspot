<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class ParamsActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema, ResourceSchemaInterface|null $schema = null): array|null
    {
        preg_match_all('/{(.*?)}/', $actionSchema->path, $matches, PREG_PATTERN_ORDER);
        $arguments = $matches[0];

        $hasBody = (in_array($actionSchema->method, HubspotConfig::METHODS_WITH_BODY) && !@$actionSchema->noBody);
       
        if ($hasBody) {
            $arguments[] = '{requestBody}';
        }

        if (empty($arguments)) {
            return null;
        }

        return $arguments;
    }
}
