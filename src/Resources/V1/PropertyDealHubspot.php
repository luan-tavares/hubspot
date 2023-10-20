<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

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
 * @method static $this create(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property
 *
 * @method static $this update(int|string $property, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property
 *
 * @method $this update(int|string $property, BaseBodyBuilder|array $requestBody) 
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
 * @method static $this createGroup(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property_group
 *
 * @method $this createGroup(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property_group
 *
 * @method static $this updateGroup(int|string $group, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property_group
 *
 * @method $this updateGroup(int|string $group, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property_group
 *
 * @method static $this deleteGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property_group
 *
 * @method $this deleteGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property_group
 *
 */
class PropertyDealHubspot extends Hubspot
{
    protected string $resource = "properties-deals-v1";

    protected int $version = 1;
}