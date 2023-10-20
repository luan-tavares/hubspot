<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

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
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a line item with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a line item with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this update(int|string $lineItemId, BaseBodyBuilder|array $requestBody) Perform a partial update of an line item identified by {lineItemId}.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this update(int|string $lineItemId, BaseBodyBuilder|array $requestBody) Perform a partial update of an line item identified by {lineItemId}.
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
 * @method static $this createAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a line item with another object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this createAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a line item with another object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this removeAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between line items and an object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this removeAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between line items and an object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of line items by ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of line items by ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of line items by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of line items by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two line items with same type.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two line items with same type.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update line item if id exists.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update line item if id exists.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 */
class LineItemHubspot extends Hubspot
{
    protected string $resource = "line-items-v3";

    protected int $version = 3;
}