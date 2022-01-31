<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this get(int|string $objectId, int|string $definitionId) 
* @method $this get(int|string $objectId, int|string $definitionId) 
* @method static $this create(array $requestBody) 
* @method $this create(array $requestBody) 
* @method static $this delete() 
* @method $this delete() 
* @method static $this batchCreate(array $requestBody) 
* @method $this batchCreate(array $requestBody) 
* @method static $this batchDelete(array $requestBody) 
* @method $this batchDelete(array $requestBody) 
 */
class CrmAssociationV1Hubspot extends Hubspot
{
    protected string $resource = "crm-associations-v1";
}
