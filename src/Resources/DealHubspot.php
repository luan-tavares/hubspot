<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() 
* @method $this getAll() 
* @method static $this get(int|string $dealId) 
* @method $this get(int|string $dealId) 
* @method static $this create(array $requestBody) 
* @method $this create(array $requestBody) 
* @method static $this archive(int|string $dealId) 
* @method $this archive(int|string $dealId) 
* @method static $this update(int|string $dealId, array $requestBody) 
* @method $this update(int|string $dealId, array $requestBody) 
* @method static $this search(array $requestBody) 
* @method $this search(array $requestBody) 
 */
class DealHubspot extends Hubspot
{
    protected string $resource = "deals-v3";
}
