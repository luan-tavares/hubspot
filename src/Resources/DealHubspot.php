<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() Read a page of deals. Control what is returned via the properties query param.
* @method $this getAll() Read a page of deals. Control what is returned via the properties query param.
* @method static $this get(int|string $dealId) Read an Object identified by {dealId}.
* @method $this get(int|string $dealId) Read an Object identified by {dealId}.
* @method static $this create(array $requestBody) Create a deal with the given properties and return a copy of the object, including the ID.
* @method $this create(array $requestBody) Create a deal with the given properties and return a copy of the object, including the ID.
* @method static $this update(int|string $dealId, array $requestBody) Perform a partial update of an Object identified by {dealId}.
* @method $this update(int|string $dealId, array $requestBody) Perform a partial update of an Object identified by {dealId}.
* @method static $this delete(int|string $dealId) Move an Object identified by {dealId} to the recycling bin.
* @method $this delete(int|string $dealId) Move an Object identified by {dealId} to the recycling bin.
* @method static $this getAssociations(int|string $dealId, int|string $toObjectType) List associations of a deal by type.
* @method $this getAssociations(int|string $dealId, int|string $toObjectType) List associations of a deal by type.
* @method static $this createAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a deal with another object.
* @method $this createAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a deal with another object.
* @method static $this removeAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a deal and an object.
* @method $this removeAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a deal and an object.
* @method static $this batchDelete(array $requestBody) Archive a batch of deals by ID.
* @method $this batchDelete(array $requestBody) Archive a batch of deals by ID.
* @method static $this batchCreate(array $requestBody) Create a batch of deals.
* @method $this batchCreate(array $requestBody) Create a batch of deals.
* @method static $this batchRead(array $requestBody) Read a batch of deals by internal ID, or unique property values.
* @method $this batchRead(array $requestBody) Read a batch of deals by internal ID, or unique property values.
* @method static $this batchUpdate(array $requestBody) Update a batch of deals.
* @method $this batchUpdate(array $requestBody) Update a batch of deals.
* @method static $this search(array $requestBody) Search deals.
* @method $this search(array $requestBody) Search deals.
 */
class DealHubspot extends Hubspot
{
    protected string $resource = "deals-v3";
}
