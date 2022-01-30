<?php

namespace LTL\HubspotApi\Resources;

use LTL\HubspotApi\Hubspot;

/**
* @method static $this getAll(int|string $objectType) 
* @method $this getAll(int|string $objectType) 
* @method static $this create(int|string $objectType, array $requestBody) 
* @method $this create(int|string $objectType, array $requestBody) 
* @method static $this update(int|string $objectType, int|string $propertyName, array $requestBody) 
* @method $this update(int|string $objectType, int|string $propertyName, array $requestBody) 
* @method static $this delete(int|string $objectType, int|string $propertyName) 
* @method $this delete(int|string $objectType, int|string $propertyName) 
* @method static $this getGroups(int|string $objectType) 
* @method $this getGroups(int|string $objectType) 
* @method static $this createGroup(int|string $objectType, array $requestBody) 
* @method $this createGroup(int|string $objectType, array $requestBody) 
* @method static $this updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
* @method $this updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
* @method static $this deleteGroup(int|string $objectType, int|string $groupName) 
* @method $this deleteGroup(int|string $objectType, int|string $groupName) 
 */
class CrmPropertyV2Hubspot extends Hubspot
{
    protected string $resource = "crm-properties-v2";
}
