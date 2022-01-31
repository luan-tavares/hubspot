<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() 
* @method $this getAll() 
* @method static $this get(int|string $id) 
* @method $this get(int|string $id) 
* @method static $this create(array $requestBody) 
* @method $this create(array $requestBody) 
* @method static $this update(int|string $id, array $requestBody) 
* @method $this update(int|string $id, array $requestBody) 
* @method static $this delete(int|string $id) 
* @method $this delete(int|string $id) 
* @method static $this getGroup(array $requestBody) 
* @method $this getGroup(array $requestBody) 
* @method static $this batchCreate(array $requestBody) 
* @method $this batchCreate(array $requestBody) 
* @method static $this batchUpdate(array $requestBody) 
* @method $this batchUpdate(array $requestBody) 
* @method static $this batchDelete(array $requestBody) 
* @method $this batchDelete(array $requestBody) 
 */
class LineItemV1Hubspot extends Hubspot
{
    protected string $resource = "line-items-v1";
}
