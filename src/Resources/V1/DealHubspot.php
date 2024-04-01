<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> get(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal
 *
 * @method self<null> get(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal
 *
 * @method static self<null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get-all-deals
 *
 * @method self<null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get-all-deals
 *
 * @method static self<null> getRecentlyModified() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_modified
 *
 * @method self<null> getRecentlyModified() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_modified
 *
 * @method static self<null> getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_created
 *
 * @method self<null> getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_created
 *
 * @method static self<null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal
 *
 * @method self<null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal
 *
 * @method static self<null> update(int|string $dealId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal
 *
 * @method self<null> update(int|string $dealId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal
 *
 * @method static self<null> delete(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal
 *
 * @method self<null> delete(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal
 *
 * @method static self<null> batchUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/batch-update-deals
 *
 * @method self<null> batchUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/batch-update-deals
 *
 */
class DealHubspot extends Hubspot
{
    protected string $resource = "deals-v1";

    protected int $version = 1;
}