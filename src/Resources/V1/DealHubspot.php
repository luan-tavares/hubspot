<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this get(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal
 *
 * @method $this get(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deal
 *
 * @method static $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get-all-deals
 *
 * @method $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get-all-deals
 *
 * @method static $this getRecentlyModified() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_modified
 *
 * @method $this getRecentlyModified() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_modified
 *
 * @method static $this getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_created
 *
 * @method $this getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/deals/get_deals_created
 *
 * @method static $this create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal
 *
 * @method $this create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/create_deal
 *
 * @method static $this update(int|string $dealId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal
 *
 * @method $this update(int|string $dealId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/update_deal
 *
 * @method static $this delete(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal
 *
 * @method $this delete(int|string $dealId) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/delete_deal
 *
 * @method static $this batchUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/batch-update-deals
 *
 * @method $this batchUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/deals/batch-update-deals
 *
 */
class DealHubspot extends Hubspot
{
    protected string $resource = "deals-v1";

    protected int $version = 1;
}
