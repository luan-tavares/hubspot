<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll(int|string $objectType) Read all existing properties for the specified object type and HubSpot account.
* @method $this getAll(int|string $objectType) Read all existing properties for the specified object type and HubSpot account.
* @method static $this get(int|string $objectType, int|string $propertyName) Read a property identified by {propertyName}.
* @method $this get(int|string $objectType, int|string $propertyName) Read a property identified by {propertyName}.
* @method static $this create(int|string $objectType, array $requestBody) Create and return a copy of a new property for the specified object type.
* @method $this create(int|string $objectType, array $requestBody) Create and return a copy of a new property for the specified object type.
* @method static $this update(int|string $objectType, int|string $propertyName, array $requestBody) Perform a partial update of a property identified by {propertyName}. Provided fields will be overwritten.
* @method $this update(int|string $objectType, int|string $propertyName, array $requestBody) Perform a partial update of a property identified by {propertyName}. Provided fields will be overwritten.
* @method static $this delete(int|string $objectType, int|string $propertyName) Move a property identified by {propertyName} to the recycling bin.
* @method $this delete(int|string $objectType, int|string $propertyName) Move a property identified by {propertyName} to the recycling bin.
* @method static $this batchDelete(int|string $objectType, array $requestBody) Archive a provided list of properties.
* @method $this batchDelete(int|string $objectType, array $requestBody) Archive a provided list of properties.
* @method static $this batchCreate(int|string $objectType, array $requestBody) Create a batch of properties using the same rules as when creating an individual property.
* @method $this batchCreate(int|string $objectType, array $requestBody) Create a batch of properties using the same rules as when creating an individual property.
* @method static $this batchRead(int|string $objectType, array $requestBody) Read a provided list of properties.
* @method $this batchRead(int|string $objectType, array $requestBody) Read a provided list of properties.
* @method static $this getAllGroups(int|string $objectType) Read all existing property groups for the specified object type and HubSpot account.
* @method $this getAllGroups(int|string $objectType) Read all existing property groups for the specified object type and HubSpot account.
* @method static $this getGroup(int|string $objectType, int|string $groupName) Read a property group identified by {groupName}.
* @method $this getGroup(int|string $objectType, int|string $groupName) Read a property group identified by {groupName}.
* @method static $this createGroup(int|string $objectType, array $requestBody) Create and return a copy of a new property group.
* @method $this createGroup(int|string $objectType, array $requestBody) Create and return a copy of a new property group.
* @method static $this updateGroup(int|string $objectType, int|string $groupName, array $requestBody) Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
* @method $this updateGroup(int|string $objectType, int|string $groupName, array $requestBody) Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
* @method static $this deleteGroup(int|string $objectType, int|string $groupName) Move a property group identified by {groupName} to the recycling bin.
* @method $this deleteGroup(int|string $objectType, int|string $groupName) Move a property group identified by {groupName} to the recycling bin.
 */
class PropertyHubspot extends Hubspot
{
    protected string $resource = "properties-v3";
}
