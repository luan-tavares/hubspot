<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getAll() 
 * See 
 *
 * @method $this getAll() 
 * See 
 *
 * @method static $this get(int|string $property) 
 * See 
 *
 * @method $this get(int|string $property) 
 * See 
 *
 * @method static $this create(array $requestBody) 
 * See 
 *
 * @method $this create(array $requestBody) 
 * See 
 *
 * @method static $this update(int|string $property, array $requestBody) 
 * See 
 *
 * @method $this update(int|string $property, array $requestBody) 
 * See 
 *
 * @method static $this delete(int|string $property) 
 * See 
 *
 * @method $this delete(int|string $property) 
 * See 
 *
 * @method static $this getAllGroups() 
 * See 
 *
 * @method $this getAllGroups() 
 * See 
 *
 * @method static $this getGroup(int|string $group) 
 * See 
 *
 * @method $this getGroup(int|string $group) 
 * See 
 *
 * @method static $this createGroup(array $requestBody) 
 * See 
 *
 * @method $this createGroup(array $requestBody) 
 * See 
 *
 * @method static $this updateGroup(int|string $group, array $requestBody) 
 * See 
 *
 * @method $this updateGroup(int|string $group, array $requestBody) 
 * See 
 *
 * @method static $this deleteGroup(int|string $group) 
 * See 
 *
 * @method $this deleteGroup(int|string $group) 
 * See 
 *
 */
class PropertyDealV1Hubspot extends Hubspot
{
    protected string $resource = "properties-deals-v1";
}
