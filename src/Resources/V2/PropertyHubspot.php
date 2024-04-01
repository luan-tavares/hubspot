<?php

namespace LTL\Hubspot\Resources\V2;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @method static self<object, null> getAll(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-properties
 *
 * @method self<object, null> getAll(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-properties
 *
 * @method static self<object, null> create(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property
 *
 * @method self<object, null> create(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property
 *
 * @method static self<object, null> update(int|string $objectType, int|string $propertyName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/update-property
 *
 * @method self<object, null> update(int|string $objectType, int|string $propertyName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/update-property
 *
 * @method static self<object, null> delete(int|string $objectType, int|string $propertyName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property
 *
 * @method self<object, null> delete(int|string $objectType, int|string $propertyName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property
 *
 * @method static self<object, null> getGroups(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-property-groups
 *
 * @method self<object, null> getGroups(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-property-groups
 *
 * @method static self<object, null> createGroup(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property-group
 *
 * @method self<object, null> createGroup(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property-group
 *
 * @method static self<object, null> updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/udpate-property-group
 *
 * @method self<object, null> updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/udpate-property-group
 *
 * @method static self<object, null> deleteGroup(int|string $objectType, int|string $groupName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property-group
 *
 * @method self<object, null> deleteGroup(int|string $objectType, int|string $groupName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property-group
 *
 */
class PropertyHubspot extends Hubspot
{
    protected string $resource = "properties-v2";

    protected int $version = 2;
}