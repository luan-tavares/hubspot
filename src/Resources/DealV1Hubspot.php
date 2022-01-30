<?php

namespace LTL\HubspotApi\Resources;

use LTL\HubspotApi\Hubspot;

/**
* @method static $this get(int|string $dealId) 
* @method $this get(int|string $dealId) 
* @method static $this getAll() 
* @method $this getAll() 
* @method static $this getRecentlyModified() 
* @method $this getRecentlyModified() 
* @method static $this getRecentlyCreated() 
* @method $this getRecentlyCreated() 
* @method static $this create(array $requestBody) 
* @method $this create(array $requestBody) 
* @method static $this update(int|string $dealId, array $requestBody) 
* @method $this update(int|string $dealId, array $requestBody) 
* @method static $this delete(int|string $dealId, array $requestBody) 
* @method $this delete(int|string $dealId, array $requestBody) 
* @method static $this batchUpdate(array $requestBody) 
* @method $this batchUpdate(array $requestBody) 
 */
class DealV1Hubspot extends Hubspot
{
    protected string $resource = "deals-v1";
}
