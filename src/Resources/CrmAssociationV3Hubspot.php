<?php

namespace LTL\HubspotApi\Resources;

use LTL\HubspotApi\Hubspot;

/**
* @method static $this batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) 
* @method $this batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) 
* @method static $this batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) 
* @method $this batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) 
* @method static $this batchArchive(int|string $fromObjectType, int|string $toObjectType, array $requestBody) 
* @method $this batchArchive(int|string $fromObjectType, int|string $toObjectType, array $requestBody) 
 */
class CrmAssociationV3Hubspot extends Hubspot
{
    protected string $resource = "crm-associations-v3";
}
