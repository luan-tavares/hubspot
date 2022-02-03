<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getAll() Returns all object schemas that have been defined for your account.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this getAll() Returns all object schemas that have been defined for your account.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this get(int|string $objectId) Returns an existing object schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this get(int|string $objectId) Returns an existing object schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this create(array $requestBody) Define a new object schema, along with custom properties and associations.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this create(array $requestBody) Define a new object schema, along with custom properties and associations.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this update(int|string $objectId, array $requestBody) Update the details for an existing object schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this update(int|string $objectId, array $requestBody) Update the details for an existing object schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this delete(int|string $objectId) Deletes a schema. Any existing records of this schema must be deleted first. Otherwise this call will fail.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this delete(int|string $objectId) Deletes a schema. Any existing records of this schema must be deleted first. Otherwise this call will fail.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this createAssociation(int|string $objectType, array $requestBody) Defines a new association between the primary schema's object type and other object types.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this createAssociation(int|string $objectType, array $requestBody) Defines a new association between the primary schema's object type and other object types.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this deleteAssociation(int|string $objectType, int|string $associationIdentifier) Removes an existing association from a schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this deleteAssociation(int|string $objectType, int|string $associationIdentifier) Removes an existing association from a schema.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this purge(int|string $objectType) ???
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this purge(int|string $objectType) ???
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 */
class CrmSchemaHubspot extends Hubspot
{
    protected string $resource = "crm-schemas-v3";
}
