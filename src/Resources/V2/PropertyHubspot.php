<?php

namespace LTL\Hubspot\Resources\V2;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> getAll(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-properties
 *
 * @method self<null> getAll(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-properties
 *
 * @method static self<null> create(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property
 *
 * @method self<null> create(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property
 *
 * @method static self<null> update(int|string $objectType, int|string $propertyName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/update-property
 *
 * @method self<null> update(int|string $objectType, int|string $propertyName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/update-property
 *
 * @method static self<null> delete(int|string $objectType, int|string $propertyName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property
 *
 * @method self<null> delete(int|string $objectType, int|string $propertyName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property
 *
 * @method static self<null> getGroups(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-property-groups
 *
 * @method self<null> getGroups(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-property-groups
 *
 * @method static self<null> createGroup(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property-group
 *
 * @method self<null> createGroup(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property-group
 *
 * @method static self<null> updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/udpate-property-group
 *
 * @method self<null> updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/udpate-property-group
 *
 * @method static self<null> deleteGroup(int|string $objectType, int|string $groupName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property-group
 *
 * @method self<null> deleteGroup(int|string $objectType, int|string $groupName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property-group
 *
 */
class PropertyHubspot extends Hubspot
{
    protected string $resource = "properties-v2";

    protected int $version = 2;
}