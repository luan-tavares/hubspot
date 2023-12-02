<?php

namespace LTL\Hubspot\Resources\V2;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;

/**
 * @method static $this getAll(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-properties
 *
 * @method $this getAll(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-properties
 *
 * @method static $this create(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property
 *
 * @method $this create(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property
 *
 * @method static $this update(int|string $objectType, int|string $propertyName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/update-property
 *
 * @method $this update(int|string $objectType, int|string $propertyName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/update-property
 *
 * @method static $this delete(int|string $objectType, int|string $propertyName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property
 *
 * @method $this delete(int|string $objectType, int|string $propertyName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property
 *
 * @method static $this getGroups(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-property-groups
 *
 * @method $this getGroups(int|string $objectType) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/get-property-groups
 *
 * @method static $this createGroup(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property-group
 *
 * @method $this createGroup(int|string $objectType, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/create-property-group
 *
 * @method static $this updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/udpate-property-group
 *
 * @method $this updateGroup(int|string $objectType, int|string $groupName, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/udpate-property-group
 *
 * @method static $this deleteGroup(int|string $objectType, int|string $groupName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property-group
 *
 * @method $this deleteGroup(int|string $objectType, int|string $groupName) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-properties/delete-property-group
 *
 */
class PropertyHubspot extends Hubspot
{
    protected string $resource = "properties-v2";

    protected int $version = 2;
}