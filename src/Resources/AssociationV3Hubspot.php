<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Get the IDs of all {toObjectType} objects associated with those specified in the request body.
* @method $this batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Get the IDs of all {toObjectType} objects associated with those specified in the request body.
* @method static $this batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Associate all pairs of objects identified in the request body.
* @method $this batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Associate all pairs of objects identified in the request body.
* @method static $this batchArchive(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Remove the associations between all pairs of objects identified in the request body.
* @method $this batchArchive(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Remove the associations between all pairs of objects identified in the request body.
 */
class AssociationV3Hubspot extends Hubspot
{
    protected string $resource = "associations-v3";
}
