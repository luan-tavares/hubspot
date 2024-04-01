<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<object> getAll(int|string $objectType) Read all existing properties for the specified object type and HubSpot account.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<object> getAll(int|string $objectType) Read all existing properties for the specified object type and HubSpot account.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<null> get(int|string $objectType, int|string $propertyName) Read a property identified by {propertyName}.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<null> get(int|string $objectType, int|string $propertyName) Read a property identified by {propertyName}.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<null> create(int|string $objectType, array $requestBody) Create and return a copy of a new property for the specified object type.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<null> create(int|string $objectType, array $requestBody) Create and return a copy of a new property for the specified object type.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<null> update(int|string $objectType, int|string $propertyName, array $requestBody) Perform a partial update of a property identified by {propertyName}. Provided fields will be overwritten.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<null> update(int|string $objectType, int|string $propertyName, array $requestBody) Perform a partial update of a property identified by {propertyName}. Provided fields will be overwritten.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<null> delete(int|string $objectType, int|string $propertyName) Move a property identified by {propertyName} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<null> delete(int|string $objectType, int|string $propertyName) Move a property identified by {propertyName} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<null> batchDelete(int|string $objectType, array $requestBody) Archive a provided list of properties.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<null> batchDelete(int|string $objectType, array $requestBody) Archive a provided list of properties.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<object> batchCreate(int|string $objectType, array $requestBody) Create a batch of properties using the same rules as when creating an individual property.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<object> batchCreate(int|string $objectType, array $requestBody) Create a batch of properties using the same rules as when creating an individual property.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<object> batchRead(int|string $objectType, array $requestBody) Read a provided list of properties.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<object> batchRead(int|string $objectType, array $requestBody) Read a provided list of properties.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<object> getAllGroups(int|string $objectType) Read all existing property groups for the specified object type and HubSpot account.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<object> getAllGroups(int|string $objectType) Read all existing property groups for the specified object type and HubSpot account.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<null> getGroup(int|string $objectType, int|string $groupName) Read a property group identified by {groupName}.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<null> getGroup(int|string $objectType, int|string $groupName) Read a property group identified by {groupName}.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<null> createGroup(int|string $objectType, array $requestBody) Create and return a copy of a new property group.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<null> createGroup(int|string $objectType, array $requestBody) Create and return a copy of a new property group.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<null> updateGroup(int|string $objectType, int|string $groupName, array $requestBody) Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<null> updateGroup(int|string $objectType, int|string $groupName, array $requestBody) Perform a partial update of a property group identified by {groupName}. Provided fields will be overwritten.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method static self<null> deleteGroup(int|string $objectType, int|string $groupName) Move a property group identified by {groupName} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 * @method self<null> deleteGroup(int|string $objectType, int|string $groupName) Move a property group identified by {groupName} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/properties
 *
 */
class PropertyHubspot extends Hubspot
{
    protected string $resource = "properties-v3";

    protected int $version = 3;
}