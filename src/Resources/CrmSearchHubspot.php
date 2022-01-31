<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this search(int|string $objectType, array $requestBody) Make a search request
* @method $this search(int|string $objectType, array $requestBody) Make a search request
 */
class CrmSearchHubspot extends Hubspot
{
    protected string $resource = "crm-search";
}
