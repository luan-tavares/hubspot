<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<array<int, object>, object> getAll() Returns all object schemas that have been defined for your account.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<array<int, object>, object> getAll() Returns all object schemas that have been defined for your account.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object, null> get(int|string $objectId) Returns an existing object schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object, null> get(int|string $objectId) Returns an existing object schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object, null> create(array $requestBody) Define a new object schema, along with custom properties and associations.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object, null> create(array $requestBody) Define a new object schema, along with custom properties and associations.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object, null> update(int|string $objectId, array $requestBody) Update the details for an existing object schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object, null> update(int|string $objectId, array $requestBody) Update the details for an existing object schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object, null> delete(int|string $objectId) Deletes a schema. Any existing records of this schema must be deleted first. Otherwise this call will fail.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object, null> delete(int|string $objectId) Deletes a schema. Any existing records of this schema must be deleted first. Otherwise this call will fail.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object, null> createAssociation(int|string $objectType, array $requestBody) Defines a new association between the primary schema's object type and other object types.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object, null> createAssociation(int|string $objectType, array $requestBody) Defines a new association between the primary schema's object type and other object types.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object, null> deleteAssociation(int|string $objectType, int|string $associationIdentifier) Removes an existing association from a schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object, null> deleteAssociation(int|string $objectType, int|string $associationIdentifier) Removes an existing association from a schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object, null> purge(int|string $objectType) ???
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object, null> purge(int|string $objectType) ???
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update schema if id exists.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update schema if id exists.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 */
class CrmSchemaHubspot extends Hubspot
{
    protected string $resource = "crm-schemas-v3";

    protected int $version = 3;
}