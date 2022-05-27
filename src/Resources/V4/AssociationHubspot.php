<?php

namespace LTL\Hubspot\Resources\V4;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this getDefinition(int|string $fromObjectType, int|string $toObjectType) Returns all association types between two object types.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this getDefinition(int|string $fromObjectType, int|string $toObjectType) Returns all association types between two object types.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this createDefinition(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Create a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this createDefinition(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Create a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this updateDefinition(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Update a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this updateDefinition(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Update a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this deleteDefinition(int|string $fromObjectType, int|string $toObjectType, int|string $associationTypeId) Deletes an association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this deleteDefinition(int|string $fromObjectType, int|string $toObjectType, int|string $associationTypeId) Deletes an association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this batchDelete(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Batch delete associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this batchDelete(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Batch delete associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this batchCreate(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Batch create associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this batchCreate(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Batch create associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this batchGet(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Batch read associations for objects to specific object type.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this batchGet(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Batch read associations for objects to specific object type.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this get(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List all associations of an object by object type. Limit 1000 per call.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this get(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List all associations of an object by object type. Limit 1000 per call.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this create(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, BaseBodyBuilder|array $requestBody) Set association labels between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this create(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, BaseBodyBuilder|array $requestBody) Set association labels between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this delete(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId) deletes all associations between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this delete(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId) deletes all associations between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 */
class AssociationHubspot extends Hubspot
{
    protected string $resource = "associations-v4";

    protected int $version = 4;
}
