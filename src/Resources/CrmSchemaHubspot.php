<?php

namespace LTL\HubspotApi\Resources;

use LTL\HubspotApi\Hubspot;

/**
* @method static $this getAll() 
* @method $this getAll() 
* @method static $this get(int|string $objectId) 
* @method $this get(int|string $objectId) 
 */
class CrmSchemaHubspot extends Hubspot
{
    protected string $resource = "crm-schemas";
}
