<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this all(int|string $objectType) 
 * See 
 *
 * @method $this all(int|string $objectType) 
 * See 
 *
 * @method static $this create(int|string $objectType, array $requestBody) 
 * See 
 *
 * @method $this create(int|string $objectType, array $requestBody) 
 * See 
 *
 * @method static $this update(int|string $objectType, int|string $propertyName, array $requestBody) 
 * See 
 *
 * @method $this update(int|string $objectType, int|string $propertyName, array $requestBody) 
 * See 
 *
 * @method static $this delete(int|string $objectType, int|string $propertyName) 
 * See 
 *
 * @method $this delete(int|string $objectType, int|string $propertyName) 
 * See 
 *
 * @method static $this getGroups(int|string $objectType) 
 * See 
 *
 * @method $this getGroups(int|string $objectType) 
 * See 
 *
 * @method static $this createGroup(int|string $objectType, array $requestBody) 
 * See 
 *
 * @method $this createGroup(int|string $objectType, array $requestBody) 
 * See 
 *
 * @method static $this updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
 * See 
 *
 * @method $this updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
 * See 
 *
 * @method static $this deleteGroup(int|string $objectType, int|string $groupName) 
 * See 
 *
 * @method $this deleteGroup(int|string $objectType, int|string $groupName) 
 * See 
 *
 */
class PropertyV2Hubspot extends Hubspot
{
    protected string $resource = "properties-v2";
}
