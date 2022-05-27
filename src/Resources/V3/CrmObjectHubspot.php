<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this getAll(int|string $objectType) Read a page of objects. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this getAll(int|string $objectType) Read a page of objects. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this get(int|string $objectType, int|string $objectId) Read an object identified by {objectId}.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this get(int|string $objectType, int|string $objectId) Read an object identified by {objectId}.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this create(int|string $objectType, BaseBodyBuilder|array $requestBody) Create a CRM object with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this create(int|string $objectType, BaseBodyBuilder|array $requestBody) Create a CRM object with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this update(int|string $objectType, int|string $objectId, BaseBodyBuilder|array $requestBody) Perform a partial update of an object identified by {objectId}.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this update(int|string $objectType, int|string $objectId, BaseBodyBuilder|array $requestBody) Perform a partial update of an object identified by {objectId}.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this delete(int|string $objectType, int|string $objectId) Move an object identified by {objectId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this delete(int|string $objectType, int|string $objectId) Move an object identified by {objectId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this gdprDelete(int|string $objectType, BaseBodyBuilder|array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this gdprDelete(int|string $objectType, BaseBodyBuilder|array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this batchRead(int|string $objectType, BaseBodyBuilder|array $requestBody) Read a batch of objects by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this batchRead(int|string $objectType, BaseBodyBuilder|array $requestBody) Read a batch of objects by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this batchCreate(int|string $objectType, BaseBodyBuilder|array $requestBody) Create a batch of objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this batchCreate(int|string $objectType, BaseBodyBuilder|array $requestBody) Create a batch of objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this batchUpdate(int|string $objectType, BaseBodyBuilder|array $requestBody) Update a batch of objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this batchUpdate(int|string $objectType, BaseBodyBuilder|array $requestBody) Update a batch of objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this batchDelete(int|string $objectType, BaseBodyBuilder|array $requestBody) Archive a batch of objects by ID.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this batchDelete(int|string $objectType, BaseBodyBuilder|array $requestBody) Archive a batch of objects by ID.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this getAssociations(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List associations of an object by type.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this getAssociations(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List associations of an object by type.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this createAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate an object with another object.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this createAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate an object with another object.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this removeAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between two objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this removeAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between two objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static $this search(int|string $objectType, BaseBodyBuilder|array $requestBody) Search objects by {objectType}.
 * See https://developers.hubspot.com/docs/api/crm/search
 *
 * @method $this search(int|string $objectType, BaseBodyBuilder|array $requestBody) Search objects by {objectType}.
 * See https://developers.hubspot.com/docs/api/crm/search
 *
 * @method static $this merge(int|string $objectType, BaseBodyBuilder|array $requestBody) Merge two objects with same type.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method $this merge(int|string $objectType, BaseBodyBuilder|array $requestBody) Merge two objects with same type.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 */
class CrmObjectHubspot extends Hubspot
{
    protected string $resource = "crm-objects-v3";

    protected int $version = 3;
}
