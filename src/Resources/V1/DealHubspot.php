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
 * @method static self<object, null> get(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal
 *
 * @method self<object, null> get(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal
 *
 * @method static self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get-all-deals
 *
 * @method self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get-all-deals
 *
 * @method static self<object, null> getRecentlyModified() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_modified
 *
 * @method self<object, null> getRecentlyModified() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_modified
 *
 * @method static self<object, null> getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_created
 *
 * @method self<object, null> getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_created
 *
 * @method static self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal
 *
 * @method self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal
 *
 * @method static self<object, null> update(int|string $dealId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal
 *
 * @method self<object, null> update(int|string $dealId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal
 *
 * @method static self<object, null> delete(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal
 *
 * @method self<object, null> delete(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal
 *
 * @method static self<object, null> batchUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/batch-update-deals
 *
 * @method self<object, null> batchUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/batch-update-deals
 *
 */
class DealHubspot extends Hubspot
{
    protected string $resource = "deals-v1";

    protected int $version = 1;
}