<?php

namespace LTL\Hubspot\Resources\V4;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;

/**
 * @link https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this getDefinition(int|string $fromObjectType, int|string $toObjectType) Returns all association types between two object types.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this getDefinition(int|string $fromObjectType, int|string $toObjectType) Returns all association types between two object types.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this createDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Create a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this createDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Create a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this updateDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Update a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this updateDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Update a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this deleteDefinition(int|string $fromObjectType, int|string $toObjectType, int|string $associationTypeId) Deletes an association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this deleteDefinition(int|string $fromObjectType, int|string $toObjectType, int|string $associationTypeId) Deletes an association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this batchDelete(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch delete associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this batchDelete(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch delete associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch create associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch create associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this batchCreateDefault(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Create the default (most generic) association type between two object types.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this batchCreateDefault(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Create the default (most generic) association type between two object types.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch read associations for objects to specific object type.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch read associations for objects to specific object type.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this getAll(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List all associations of an object by object type. Limit 1000 per call.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this getAll(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List all associations of an object by object type. Limit 1000 per call.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this create(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, array $requestBody) Set association labels between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this create(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, array $requestBody) Set association labels between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this delete(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId) deletes all associations between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this delete(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId) deletes all associations between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static $this importAll(string|int $fromObjectType, string|int $fromObjectId, string|int $toObjectType, callable $fn) (Handler) Import All relations using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method $this importAll(string|int $fromObjectType, string|int $fromObjectId, string|int $toObjectType, callable $fn) (Handler) Import All relations using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 */
class AssociationHubspot extends Hubspot
{
    protected string $resource = "associations-v4";

    protected int $version = 4;
}