<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class ParamsActionProperty extends ActionProperty
{
    protected function parse(object $actionSchema): array|null
    {
        if (isset($actionSchema->handler)) {
            return null;
        }
        
        preg_match_all('/{(.*?)}/', $actionSchema->path, $matches, PREG_PATTERN_ORDER);
        $arguments = $matches[0];

        if (empty($arguments)) {
            return null;
        }

        return $arguments;
    }
}
