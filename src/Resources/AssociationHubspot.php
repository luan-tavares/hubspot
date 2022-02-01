<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getDefinition(int|string $fromObjectType, int|string $toObjectType) Returns all association types between two object types.
* @method $this getDefinition(int|string $fromObjectType, int|string $toObjectType) Returns all association types between two object types.
* @method static $this createDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Create a user defined association definition.
* @method $this createDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Create a user defined association definition.
* @method static $this updateDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Update a user defined association definition.
* @method $this updateDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Update a user defined association definition.
* @method static $this deleteDefinition(int|string $fromObjectType, int|string $toObjectType, int|string $associationTypeId) Deletes an association definition.
* @method $this deleteDefinition(int|string $fromObjectType, int|string $toObjectType, int|string $associationTypeId) Deletes an association definition.
* @method static $this batchDelete(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch delete associations for objects.
* @method $this batchDelete(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch delete associations for objects.
* @method static $this batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch create associations for objects.
* @method $this batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch create associations for objects.
* @method static $this batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch read associations for objects to specific object type.
* @method $this batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch read associations for objects to specific object type.
* @method static $this get(int|string $objectType, int|string $objectId, int|string $toObjectType) List all associations of an object by object type. Limit 1000 per call.
* @method $this get(int|string $objectType, int|string $objectId, int|string $toObjectType) List all associations of an object by object type. Limit 1000 per call.
* @method static $this create(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, array $requestBody) Set association labels between two records.
* @method $this create(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, array $requestBody) Set association labels between two records.
* @method static $this delete(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId) deletes all associations between two records.
* @method $this delete(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId) deletes all associations between two records.
 */
class AssociationHubspot extends Hubspot
{
    protected string $resource = "associations-v4";
}
