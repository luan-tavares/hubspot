<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Resources\V3\Interfaces\{EngagementHubspotInterface, CrmHubspotInterface};

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this getAll() Read a page of emails. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this getAll() Read a page of emails. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this get(int|string $emailId) Read an note identified by {emailId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this get(int|string $emailId) Read an note identified by {emailId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this update(int|string $emailId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an note identified by {emailId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this update(int|string $emailId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an note identified by {emailId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this delete(int|string $emailId) Move an note identified by {emailId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this delete(int|string $emailId) Move an note identified by {emailId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this getAssociations(int|string $emailId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this getAssociations(int|string $emailId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this createAssociation(int|string $emailId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this createAssociation(int|string $emailId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this removeAssociation(int|string $emailId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this removeAssociation(int|string $emailId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of emails by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of emails by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of emails by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of emails by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this search(array|Body\HubspotSearchBody $requestBody) Search emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this search(array|Body\HubspotSearchBody $requestBody) Search emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this merge(array $requestBody) Merge two emails with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this merge(array $requestBody) Merge two emails with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update email if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update email if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 */
class EngagementEmailHubspot extends Hubspot implements EngagementHubspotInterface, CrmHubspotInterface
{
    protected string $resource = "engagements-emails-v3";

    protected int $version = 3;
}