<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

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
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a deal with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a deal with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this update(int|string $dealId, BaseBodyBuilder|array $requestBody) Perform a partial update of an deal identified by {dealId}.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this update(int|string $dealId, BaseBodyBuilder|array $requestBody) Perform a partial update of an deal identified by {dealId}.
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
 * @method static $this createAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a deal with another object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this createAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a deal with another object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this removeAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a deal and an object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this removeAssociation(int|string $dealId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a deal and an object.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of deals by ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of deals by ID.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of deals by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of deals by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search deals.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two deals with same type.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two deals with same type.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update deal if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update deal if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method static $this importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 * @method $this importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/deals
 *
 */
class DealHubspot extends Hubspot
{
    protected string $resource = "deals-v3";

    protected int $version = 3;
}