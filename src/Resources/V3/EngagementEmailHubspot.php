<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

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
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this update(int|string $emailId, BaseBodyBuilder|array $requestBody) Perform a partial update of an note identified by {emailId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this update(int|string $emailId, BaseBodyBuilder|array $requestBody) Perform a partial update of an note identified by {emailId}.
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
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of emails by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of emails by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of emails by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of emails by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search emails.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two emails with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two emails with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/emails
 *
 */
class EngagementEmailHubspot extends Hubspot
{
    protected string $resource = "engagements-emails-v3";

    protected int $version = 3;
}
