<?php

namespace LTL\HubspotApi\Resources;

use LTL\HubspotApi\Hubspot;

/**
* @method static $this get(int|string $dealId, array $requestBody) 
* @method $this get(int|string $dealId, array $requestBody) 
* @method static $this getAll(array $requestBody) 
* @method $this getAll(array $requestBody) 
* @method static $this getRecentlyModified(array $requestBody) 
* @method $this getRecentlyModified(array $requestBody) 
* @method static $this getRecentlyCreated(array $requestBody) 
* @method $this getRecentlyCreated(array $requestBody) 
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
