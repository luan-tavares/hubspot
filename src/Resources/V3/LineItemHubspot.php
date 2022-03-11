<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;

/**
 * @link https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this getAll() Read a page of line items. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this getAll() Read a page of line items. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this get(int|string $lineItemId) Read an line item identified by {lineItemId}.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this get(int|string $lineItemId) Read an line item identified by {lineItemId}.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this create(array $requestBody) Create a line item with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this create(array $requestBody) Create a line item with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this update(int|string $lineItemId, array $requestBody) Perform a partial update of an line item identified by {lineItemId}.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this update(int|string $lineItemId, array $requestBody) Perform a partial update of an line item identified by {lineItemId}.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this delete(int|string $lineItemId) Move an line item identified by {lineItemId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this delete(int|string $lineItemId) Move an line item identified by {lineItemId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this getAssociations(int|string $lineItemId, int|string $toObjectType) List associations of a line item by type.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this getAssociations(int|string $lineItemId, int|string $toObjectType) List associations of a line item by type.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this createAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a line item with another object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this createAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a line item with another object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this removeAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between line items and an object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this removeAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between line items and an object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this batchDelete(array $requestBody) Archive a batch of line items by ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this batchDelete(array $requestBody) Archive a batch of line items by ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this batchCreate(array $requestBody) Create a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this batchCreate(array $requestBody) Create a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this batchRead(array $requestBody) Read a batch of line items by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this batchRead(array $requestBody) Read a batch of line items by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this batchUpdate(array $requestBody) Update a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this batchUpdate(array $requestBody) Update a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this search(array $requestBody) Search line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this search(array $requestBody) Search line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 */
class LineItemHubspot extends Hubspot
{
    protected string $resource = "line-items-v3";

    protected int $version = 3;
}
