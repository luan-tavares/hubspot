<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Resources\V3\Interfaces\{CrmHubspotInterface};

/**
 * @link https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this getAll() Read a page of deals. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this getAll() Read a page of deals. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this get(int|string $dealId) Read an deal identified by {dealId}.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this get(int|string $dealId) Read an deal identified by {dealId}.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a deal with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a deal with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this update(int|string $dealId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an deal identified by {dealId}.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this update(int|string $dealId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an deal identified by {dealId}.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this delete(int|string $dealId) Move an deal identified by {dealId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this delete(int|string $dealId) Move an deal identified by {dealId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this getAssociations(int|string $dealId, int|string $toObjectType) List associations of a deal by type.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this getAssociations(int|string $dealId, int|string $toObjectType) List associations of a deal by type.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this createAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a deal with another object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this createAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a deal with another object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this removeAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a deal and an object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this removeAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a deal and an object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of deals by ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of deals by ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of deals by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of deals by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this search(array|Body\HubspotSearchBody $requestBody) Search deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this search(array|Body\HubspotSearchBody $requestBody) Search deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this merge(array $requestBody) Merge two deals with same type.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this merge(array $requestBody) Merge two deals with same type.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update deal if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update deal if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 */
class DealHubspot extends Hubspot implements CrmHubspotInterface
{
    protected string $resource = "deals-v3";

    protected int $version = 3;
}