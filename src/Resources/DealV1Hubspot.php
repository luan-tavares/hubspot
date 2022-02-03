<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this get(int|string $dealId) 
 * See 
 *
 * @method $this get(int|string $dealId) 
 * See 
 *
 * @method static $this getAll() 
 * See 
 *
 * @method $this getAll() 
 * See 
 *
 * @method static $this getRecentlyModified() 
 * See 
 *
 * @method $this getRecentlyModified() 
 * See 
 *
 * @method static $this getRecentlyCreated() 
 * See 
 *
 * @method $this getRecentlyCreated() 
 * See 
 *
 * @method static $this create(array $requestBody) 
 * See 
 *
 * @method $this create(array $requestBody) 
 * See 
 *
 * @method static $this update(int|string $dealId, array $requestBody) 
 * See 
 *
 * @method $this update(int|string $dealId, array $requestBody) 
 * See 
 *
 * @method static $this delete(int|string $dealId) 
 * See 
 *
 * @method $this delete(int|string $dealId) 
 * See 
 *
 * @method static $this batchUpdate(array $requestBody) 
 * See 
 *
 * @method $this batchUpdate(array $requestBody) 
 * See 
 *
 */
class DealV1Hubspot extends Hubspot
{
    protected string $resource = "deals-v1";
}
