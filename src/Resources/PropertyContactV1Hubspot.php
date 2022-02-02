<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() 
* @method $this getAll() 
* @method static $this get(int|string $property_name) 
* @method $this get(int|string $property_name) 
* @method static $this create(array $requestBody) 
* @method $this create(array $requestBody) 
* @method static $this update(int|string $property_name, array $requestBody) 
* @method $this update(int|string $property_name, array $requestBody) 
* @method static $this delete(int|string $property_name) 
* @method $this delete(int|string $property_name) 
* @method static $this getAllGroups(array $requestBody) 
* @method $this getAllGroups(array $requestBody) 
* @method static $this createGroup(array $requestBody) 
* @method $this createGroup(array $requestBody) 
* @method static $this updateGroup(int|string $group_name, array $requestBody) 
* @method $this updateGroup(int|string $group_name, array $requestBody) 
 */
class PropertyContactV1Hubspot extends Hubspot
{
    protected string $resource = "properties-contacts-v1";
}
