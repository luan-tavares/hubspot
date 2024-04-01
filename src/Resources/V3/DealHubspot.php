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
 * @link https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<array<int, object>, object> getAll() Read a page of deals. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<array<int, object>, object> getAll() Read a page of deals. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<object, null> get(int|string $dealId) Read an deal identified by {dealId}.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<object, null> get(int|string $dealId) Read an deal identified by {dealId}.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<object, null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a deal with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<object, null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a deal with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<object, null> update(int|string $dealId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an deal identified by {dealId}.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<object, null> update(int|string $dealId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an deal identified by {dealId}.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<object, null> delete(int|string $dealId) Move an deal identified by {dealId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<object, null> delete(int|string $dealId) Move an deal identified by {dealId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<array<int, object>, object> getAssociations(int|string $dealId, int|string $toObjectType) List associations of a deal by type.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<array<int, object>, object> getAssociations(int|string $dealId, int|string $toObjectType) List associations of a deal by type.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<object, null> createAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a deal with another object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<object, null> createAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a deal with another object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<object, null> removeAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a deal and an object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<object, null> removeAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a deal and an object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<object, null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of deals by ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<object, null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of deals by ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<array<int, object>, object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<array<int, object>, object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<array<int, object>, object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of deals by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<array<int, object>, object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of deals by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<array<int, object>, object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<array<int, object>, object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<array<int, object>, object> search(array|Body\HubspotSearchBody $requestBody) Search deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<array<int, object>, object> search(array|Body\HubspotSearchBody $requestBody) Search deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<object, null> merge(array $requestBody) Merge two deals with same type.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<object, null> merge(array $requestBody) Merge two deals with same type.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update deal if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update deal if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static self<object, null> importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method self<object, null> importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 */
class DealHubspot extends Hubspot implements CrmHubspotInterface
{
    protected string $resource = "deals-v3";

    protected int $version = 3;
}