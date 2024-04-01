<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_properties
 *
 * @method self<null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_properties
 *
 * @method static self<null> get(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property
 *
 * @method self<null> get(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property
 *
 * @method static self<null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property
 *
 * @method self<null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property
 *
 * @method static self<null> update(int|string $property, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property
 *
 * @method self<null> update(int|string $property, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property
 *
 * @method static self<null> delete(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property
 *
 * @method self<null> delete(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property
 *
 * @method static self<null> getAllGroups() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_groups
 *
 * @method self<null> getAllGroups() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_groups
 *
 * @method static self<null> getGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_group
 *
 * @method self<null> getGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_group
 *
 * @method static self<null> createGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property_group
 *
 * @method self<null> createGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property_group
 *
 * @method static self<null> updateGroup(int|string $group, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property_group
 *
 * @method self<null> updateGroup(int|string $group, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property_group
 *
 * @method static self<null> deleteGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property_group
 *
 * @method self<null> deleteGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property_group
 *
 */
class PropertyDealHubspot extends Hubspot
{
    protected string $resource = "properties-deals-v1";

    protected int $version = 1;
}