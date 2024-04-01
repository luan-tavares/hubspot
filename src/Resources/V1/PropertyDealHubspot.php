<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @method static self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_properties
 *
 * @method self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_properties
 *
 * @method static self<object, null> get(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property
 *
 * @method self<object, null> get(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property
 *
 * @method static self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property
 *
 * @method self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property
 *
 * @method static self<object, null> update(int|string $property, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property
 *
 * @method self<object, null> update(int|string $property, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property
 *
 * @method static self<object, null> delete(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property
 *
 * @method self<object, null> delete(int|string $property) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property
 *
 * @method static self<object, null> getAllGroups() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_groups
 *
 * @method self<object, null> getAllGroups() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_groups
 *
 * @method static self<object, null> getGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_group
 *
 * @method self<object, null> getGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property_group
 *
 * @method static self<object, null> createGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property_group
 *
 * @method self<object, null> createGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal_property_group
 *
 * @method static self<object, null> updateGroup(int|string $group, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property_group
 *
 * @method self<object, null> updateGroup(int|string $group, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal_property_group
 *
 * @method static self<object, null> deleteGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property_group
 *
 * @method self<object, null> deleteGroup(int|string $group) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal_property_group
 *
 */
class PropertyDealHubspot extends Hubspot
{
    protected string $resource = "properties-deals-v1";

    protected int $version = 1;
}