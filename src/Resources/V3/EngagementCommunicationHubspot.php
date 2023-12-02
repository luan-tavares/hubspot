<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Resources\V3\Interfaces\EngagementInterface;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this getAll() Read a page of calls. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this getAll() Read a page of calls. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this get(int|string $communicationId) Read an note identified by {communicationId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this get(int|string $communicationId) Read an note identified by {communicationId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this update(int|string $communicationId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an note identified by {communicationId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this update(int|string $communicationId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an note identified by {communicationId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this delete(int|string $communicationId) Move an note identified by {communicationId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this delete(int|string $communicationId) Move an note identified by {communicationId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this getAssociations(int|string $communicationId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this getAssociations(int|string $communicationId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this createAssociation(int|string $communicationId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this createAssociation(int|string $communicationId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this removeAssociation(int|string $communicationId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this removeAssociation(int|string $communicationId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of calls by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of calls by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of calls by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of calls by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this search(array|Body\HubspotSearchBody $requestBody) Search calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this search(array|Body\HubspotSearchBody $requestBody) Search calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this merge(array $requestBody) Merge two calls with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this merge(array $requestBody) Merge two calls with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update communication if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update communication if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method static $this importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 * @method $this importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/communications
 *
 */
class EngagementCommunicationHubspot extends Hubspot implements EngagementInterface
{
    protected string $resource = "engagements-communications-v3";

    protected int $version = 3;
}