<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll(int|string $objectType) Read a page of objects. Control what is returned via the properties query param.
* @method $this getAll(int|string $objectType) Read a page of objects. Control what is returned via the properties query param.
* @method static $this get(int|string $objectType, int|string $objectId) Read an object identified by {objectId}.
* @method $this get(int|string $objectType, int|string $objectId) Read an object identified by {objectId}.
* @method static $this create(int|string $objectType, array $requestBody) Create a CRM object with the given properties and return a copy of the object, including the ID.
* @method $this create(int|string $objectType, array $requestBody) Create a CRM object with the given properties and return a copy of the object, including the ID.
* @method static $this update(int|string $objectType, int|string $objectId, array $requestBody) Perform a partial update of an object identified by {objectId}.
* @method $this update(int|string $objectType, int|string $objectId, array $requestBody) Perform a partial update of an object identified by {objectId}.
* @method static $this delete(int|string $objectType, int|string $objectId) Move an object identified by {objectId} to the recycling bin.
* @method $this delete(int|string $objectType, int|string $objectId) Move an object identified by {objectId} to the recycling bin.
* @method static $this gdprDelete(int|string $objectType, array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
* @method $this gdprDelete(int|string $objectType, array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
* @method static $this batchRead(int|string $objectType, array $requestBody) Read a batch of objects by internal ID, or unique property values.
* @method $this batchRead(int|string $objectType, array $requestBody) Read a batch of objects by internal ID, or unique property values.
* @method static $this batchCreate(int|string $objectType, array $requestBody) Create a batch of objects.
* @method $this batchCreate(int|string $objectType, array $requestBody) Create a batch of objects.
* @method static $this batchUpdate(int|string $objectType, array $requestBody) Update a batch of objects.
* @method $this batchUpdate(int|string $objectType, array $requestBody) Update a batch of objects.
* @method static $this batchDelete(int|string $objectType, array $requestBody) Archive a batch of objects by ID.
* @method $this batchDelete(int|string $objectType, array $requestBody) Archive a batch of objects by ID.
* @method static $this getAssociations(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List associations of an object by type.
* @method $this getAssociations(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List associations of an object by type.
* @method static $this createAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate an object with another object.
* @method $this createAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate an object with another object.
* @method static $this removeAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between two objects.
* @method $this removeAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between two objects.
* @method static $this search(int|string $objectType, array $requestBody) Search objects by {objectType}.
* @method $this search(int|string $objectType, array $requestBody) Search objects by {objectType}.
 */
class CrmObjectHubspot extends Hubspot
{
    protected string $resource = "crm-objects-v3";
}
