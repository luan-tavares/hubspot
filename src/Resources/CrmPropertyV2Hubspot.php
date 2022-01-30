<?php

namespace LTL\HubspotApi\Resources;

use LTL\HubspotApi\Hubspot;

/**
* @method static $this getAll(int|string $object_type) 
* @method $this getAll(int|string $object_type) 
* @method static $this create(int|string $object_type, array $requestBody) 
* @method $this create(int|string $object_type, array $requestBody) 
* @method static $this update(int|string $object_type, int|string $property_name, array $requestBody) 
* @method $this update(int|string $object_type, int|string $property_name, array $requestBody) 
* @method static $this delete(int|string $object_type, int|string $property_name) 
* @method $this delete(int|string $object_type, int|string $property_name) 
* @method static $this getGroups(int|string $object_type) 
* @method $this getGroups(int|string $object_type) 
* @method static $this createGroup(int|string $object_type, array $requestBody) 
* @method $this createGroup(int|string $object_type, array $requestBody) 
* @method static $this updateGroup(int|string $object_type, int|string $group_name, array $requestBody) 
* @method $this updateGroup(int|string $object_type, int|string $group_name, array $requestBody) 
* @method static $this deleteGroup(int|string $object_type, int|string $group_name) 
* @method $this deleteGroup(int|string $object_type, int|string $group_name) 
 */
class CrmPropertyV2Hubspot extends Hubspot
{
    protected string $resource = "crm-properties-v2";
}
