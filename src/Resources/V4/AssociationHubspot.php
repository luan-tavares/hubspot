<?php

namespace LTL\Hubspot\Resources\V4;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static Objects\AssociationDefinitionObject&self<object> getDefinition(int|string $fromObjectType, int|string $toObjectType) Returns all association types between two object types.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method Objects\AssociationDefinitionObject&self<object> getDefinition(int|string $fromObjectType, int|string $toObjectType) Returns all association types between two object types.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static Objects\AssociationDefinitionObject&self<object> createDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Create a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method Objects\AssociationDefinitionObject&self<object> createDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Create a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static self<null> updateDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Update a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method self<null> updateDefinition(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Update a user defined association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static self<null> deleteDefinition(int|string $fromObjectType, int|string $toObjectType, int|string $associationTypeId) Deletes an association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method self<null> deleteDefinition(int|string $fromObjectType, int|string $toObjectType, int|string $associationTypeId) Deletes an association definition.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static self<null> batchDelete(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch delete associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method self<null> batchDelete(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch delete associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static Objects\AssociationObject&self<null> batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch create associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method Objects\AssociationObject&self<null> batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch create associations for objects.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static self<null> batchCreateDefault(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Create the default (most generic) association type between two object types.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method self<null> batchCreateDefault(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Create the default (most generic) association type between two object types.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static self<object> batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch read associations for objects to specific object type.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method self<object> batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Batch read associations for objects to specific object type.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static self<object> getAll(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List all associations of an object by object type. Limit 1000 per call.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method self<object> getAll(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List all associations of an object by object type. Limit 1000 per call.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static self<null> create(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, array $requestBody) Set association labels between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method self<null> create(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, array $requestBody) Set association labels between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static self<null> createDefault(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId) Set association labels between two records default.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method self<null> createDefault(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId) Set association labels between two records default.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static self<null> delete(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId) deletes all associations between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method self<null> delete(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId) deletes all associations between two records.
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method static self<null> importAll(string|int $fromObjectType, string|int $fromObjectId, string|int $toObjectType, callable $fn) (Handler) Import All relations using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 * @method self<null> importAll(string|int $fromObjectType, string|int $fromObjectId, string|int $toObjectType, callable $fn) (Handler) Import All relations using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/associations/v4
 *
 */
class AssociationHubspot extends Hubspot
{
    protected string $resource = "associations-v4";

    protected int $version = 4;
}