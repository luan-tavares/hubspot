<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this list(int|string $objectType) 
* @method $this list(int|string $objectType) 
* @method static $this get(int|string $objectType, int|string $propertyName) 
* @method $this get(int|string $objectType, int|string $propertyName) 
* @method static $this create(int|string $objectType, array $requestBody) 
* @method $this create(int|string $objectType, array $requestBody) 
* @method static $this update(int|string $objectType, int|string $propertyName, array $requestBody) 
* @method $this update(int|string $objectType, int|string $propertyName, array $requestBody) 
* @method static $this archive(int|string $objectType, int|string $propertyName) 
* @method $this archive(int|string $objectType, int|string $propertyName) 
* @method static $this batchArchive(int|string $objectType, array $requestBody) 
* @method $this batchArchive(int|string $objectType, array $requestBody) 
* @method static $this batchCreate(int|string $objectType, array $requestBody) 
* @method $this batchCreate(int|string $objectType, array $requestBody) 
* @method static $this batchGet(int|string $objectType, array $requestBody) 
* @method $this batchGet(int|string $objectType, array $requestBody) 
* @method static $this listGroups(int|string $objectType) 
* @method $this listGroups(int|string $objectType) 
* @method static $this readGroup(int|string $objectType, int|string $groupName) 
* @method $this readGroup(int|string $objectType, int|string $groupName) 
* @method static $this createGroup(int|string $objectType, array $requestBody) 
* @method $this createGroup(int|string $objectType, array $requestBody) 
* @method static $this updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
* @method $this updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
* @method static $this archiveGroup(int|string $objectType, int|string $groupName) 
* @method $this archiveGroup(int|string $objectType, int|string $groupName) 
 */
class CrmPropertyHubspot extends Hubspot
{
    protected string $resource = "crm-properties";
}
