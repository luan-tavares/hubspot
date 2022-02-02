<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this get(int|string $objectId, int|string $definitionId) 
 * See 
 *
 * @method $this get(int|string $objectId, int|string $definitionId) 
 * See 
 *
 * @method static $this create(array $requestBody) 
 * See 
 *
 * @method $this create(array $requestBody) 
 * See 
 *
 * @method static $this delete() 
 * See 
 *
 * @method $this delete() 
 * See 
 *
 * @method static $this batchCreate(array $requestBody) 
 * See 
 *
 * @method $this batchCreate(array $requestBody) 
 * See 
 *
 * @method static $this batchDelete(array $requestBody) 
 * See 
 *
 * @method $this batchDelete(array $requestBody) 
 * See 
 *
 */
class AssociationV1Hubspot extends Hubspot
{
    protected string $resource = "associations-v1";
}
