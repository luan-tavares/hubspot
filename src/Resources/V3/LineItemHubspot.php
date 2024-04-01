<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;
use LTL\Hubspot\Resources\V3\Interfaces\{CrmHubspotInterface};

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<array<int, object>, object> getAll() Read a page of line items. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<array<int, object>, object> getAll() Read a page of line items. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<object, null> get(int|string $lineItemId) Read an line item identified by {lineItemId}.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<object, null> get(int|string $lineItemId) Read an line item identified by {lineItemId}.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<object, null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a line item with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<object, null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a line item with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<object, null> update(int|string $lineItemId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an line item identified by {lineItemId}.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<object, null> update(int|string $lineItemId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an line item identified by {lineItemId}.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<object, null> delete(int|string $lineItemId) Move an line item identified by {lineItemId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<object, null> delete(int|string $lineItemId) Move an line item identified by {lineItemId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<array<int, object>, object> getAssociations(int|string $lineItemId, int|string $toObjectType) List associations of a line item by type.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<array<int, object>, object> getAssociations(int|string $lineItemId, int|string $toObjectType) List associations of a line item by type.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<object, null> createAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a line item with another object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<object, null> createAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a line item with another object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<object, null> removeAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between line items and an object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<object, null> removeAssociation(int|string $lineItemId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between line items and an object.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<object, null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of line items by ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<object, null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of line items by ID.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<array<int, object>, object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<array<int, object>, object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<array<int, object>, object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of line items by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<array<int, object>, object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of line items by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<array<int, object>, object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<array<int, object>, object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<array<int, object>, object> search(array|Body\HubspotSearchBody $requestBody) Search line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<array<int, object>, object> search(array|Body\HubspotSearchBody $requestBody) Search line items.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<object, null> merge(array $requestBody) Merge two line items with same type.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<object, null> merge(array $requestBody) Merge two line items with same type.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method static self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update line item if id exists.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 * @method self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update line item if id exists.
 * See https://developers.hubspot.com/docs/api/crm/line-items
 *
 */
class LineItemHubspot extends Hubspot implements CrmHubspotInterface
{
    protected string $resource = "line-items-v3";

    protected int $version = 3;
}