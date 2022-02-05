<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_properties
 *
 * @method $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_properties
 *
 * @method static $this get(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property
 *
 * @method $this get(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property
 *
 * @method static $this create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property
 *
 * @method $this create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property
 *
 * @method static $this update(int|string $property, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property
 *
 * @method $this update(int|string $property, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property
 *
 * @method static $this delete(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property
 *
 * @method $this delete(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property
 *
 * @method static $this getAllGroups() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_groups
 *
 * @method $this getAllGroups() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_groups
 *
 * @method static $this getGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_group
 *
 * @method $this getGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_group
 *
 * @method static $this createGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property_group
 *
 * @method $this createGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property_group
 *
 * @method static $this updateGroup(int|string $group, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property_group
 *
 * @method $this updateGroup(int|string $group, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property_group
 *
 * @method static $this deleteGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property_group
 *
 * @method $this deleteGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property_group
 *
 */
class PropertyDealV1Hubspot extends Hubspot
{
    protected string $resource = "properties-deals-v1";
}
