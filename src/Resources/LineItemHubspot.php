<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() Read a page of line items. Control what is returned via the properties query param.
* @method $this getAll() Read a page of line items. Control what is returned via the properties query param.
* @method static $this get(int|string $lineItemId) Read an Object identified by {lineItemId}.
* @method $this get(int|string $lineItemId) Read an Object identified by {lineItemId}.
* @method static $this create(array $requestBody) Create a line item with the given properties and return a copy of the object, including the ID.
* @method $this create(array $requestBody) Create a line item with the given properties and return a copy of the object, including the ID.
* @method static $this update(int|string $lineItemId, array $requestBody) Perform a partial update of an Object identified by {lineItemId}.
* @method $this update(int|string $lineItemId, array $requestBody) Perform a partial update of an Object identified by {lineItemId}.
* @method static $this delete(int|string $lineItemId) Move an Object identified by {lineItemId} to the recycling bin.
* @method $this delete(int|string $lineItemId) Move an Object identified by {lineItemId} to the recycling bin.
* @method static $this getAssociations(int|string $lineItemId, int|string $toObjectType) List associations of a line item by type.
* @method $this getAssociations(int|string $lineItemId, int|string $toObjectType) List associations of a line item by type.
* @method static $this createAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a line item with another object.
* @method $this createAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a line item with another object.
* @method static $this removeAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between line items and an object.
* @method $this removeAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between line items and an object.
* @method static $this batchDelete(array $requestBody) Archive a batch of line items by ID.
* @method $this batchDelete(array $requestBody) Archive a batch of line items by ID.
* @method static $this batchCreate(array $requestBody) Create a batch of line items.
* @method $this batchCreate(array $requestBody) Create a batch of line items.
* @method static $this batchRead(array $requestBody) Read a batch of line items by internal ID, or unique property values.
* @method $this batchRead(array $requestBody) Read a batch of line items by internal ID, or unique property values.
* @method static $this batchUpdate(array $requestBody) Update a batch of line items.
* @method $this batchUpdate(array $requestBody) Update a batch of line items.
* @method static $this search(array $requestBody) Search line items.
* @method $this search(array $requestBody) Search line items.
 */
class LineItemHubspot extends Hubspot
{
    protected string $resource = "line-items-v3";
}
