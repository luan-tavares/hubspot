<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this getAll(int|string $objectType) Read all existing properties for the specified object type and HubSpot account.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this getAll(int|string $objectType) Read all existing properties for the specified object type and HubSpot account.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this get(int|string $objectType, int|string $propertyName) Read a property identified by {propertyName}.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this get(int|string $objectType, int|string $propertyName) Read a property identified by {propertyName}.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this create(int|string $objectType, BaseBodyBuilder|array $requestBody) Create and return a copy of a new property for the specified object type.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this create(int|string $objectType, BaseBodyBuilder|array $requestBody) Create and return a copy of a new property for the specified object type.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this update(int|string $objectType, int|string $propertyName, BaseBodyBuilder|array $requestBody) Perform a partial update of a property identified by {propertyName}. Provided fields will be overwritten.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this update(int|string $objectType, int|string $propertyName, BaseBodyBuilder|array $requestBody) Perform a partial update of a property identified by {propertyName}. Provided fields will be overwritten.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this delete(int|string $objectType, int|string $propertyName) Move a property identified by {propertyName} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this delete(int|string $objectType, int|string $propertyName) Move a property identified by {propertyName} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this batchDelete(int|string $objectType, BaseBodyBuilder|array $requestBody) Archive a provided list of properties.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this batchDelete(int|string $objectType, BaseBodyBuilder|array $requestBody) Archive a provided list of properties.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this batchCreate(int|string $objectType, BaseBodyBuilder|array $requestBody) Create a batch of properties using the same rules as when creating an individual property.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this batchCreate(int|string $objectType, BaseBodyBuilder|array $requestBody) Create a batch of properties using the same rules as when creating an individual property.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this batchRead(int|string $objectType, BaseBodyBuilder|array $requestBody) Read a provided list of properties.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this batchRead(int|string $objectType, BaseBodyBuilder|array $requestBody) Read a provided list of properties.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this getAllGroups(int|string $objectType) Read all existing property groups for the specified object type and HubSpot account.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this getAllGroups(int|string $objectType) Read all existing property groups for the specified object type and HubSpot account.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this getGroup(int|string $objectType, int|string $groupName) Read a property group identified by {groupName}.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this getGroup(int|string $objectType, int|string $groupName) Read a property group identified by {groupName}.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this createGroup(int|string $objectType, BaseBodyBuilder|array $requestBody) Create and return a copy of a new property group.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this createGroup(int|string $objectType, BaseBodyBuilder|array $requestBody) Create and return a copy of a new property group.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this updateGroup(int|string $objectType, int|string $groupName, BaseBodyBuilder|array $requestBody) Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this updateGroup(int|string $objectType, int|string $groupName, BaseBodyBuilder|array $requestBody) Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static $this deleteGroup(int|string $objectType, int|string $groupName) Move a property group identified by {groupName} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method $this deleteGroup(int|string $objectType, int|string $groupName) Move a property group identified by {groupName} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 */
class PropertyHubspot extends Hubspot
{
    protected string $resource = "properties-v3";

    protected int $version = 3;
}
