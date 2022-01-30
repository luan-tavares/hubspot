<?php

namespace LTL\HubspotApi\Resources;

use LTL\HubspotApi\Hubspot;

/**
* @method static $this list(int|string $objectType) 
* @method $this list(int|string $objectType) 
* @method static $this get(int|string $objectType, int|string $objectId) 
* @method $this get(int|string $objectType, int|string $objectId) 
* @method static $this create(int|string $objectType, array $requestBody) 
* @method $this create(int|string $objectType, array $requestBody) 
* @method static $this archive(int|string $objectType, int|string $objectId) 
* @method $this archive(int|string $objectType, int|string $objectId) 
* @method static $this update(int|string $objectType, int|string $objectId, array $requestBody) 
* @method $this update(int|string $objectType, int|string $objectId, array $requestBody) 
* @method static $this delete(int|string $objectType, array $requestBody) 
* @method $this delete(int|string $objectType, array $requestBody) 
* @method static $this search(int|string $objectType, array $requestBody) 
* @method $this search(int|string $objectType, array $requestBody) 
 */
class CrmObjectHubspot extends Hubspot
{
    protected string $resource = "crm-objects";
}
