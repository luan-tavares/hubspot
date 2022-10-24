<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this getAll() Read a page of meetings. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this getAll() Read a page of meetings. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this get(int|string $meetingId) Read an note identified by {meetingId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this get(int|string $meetingId) Read an note identified by {meetingId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this update(int|string $meetingId, BaseBodyBuilder|array $requestBody) Perform a partial update of an note identified by {meetingId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this update(int|string $meetingId, BaseBodyBuilder|array $requestBody) Perform a partial update of an note identified by {meetingId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this delete(int|string $meetingId) Move an note identified by {meetingId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this delete(int|string $meetingId) Move an note identified by {meetingId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this getAssociations(int|string $meetingId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this getAssociations(int|string $meetingId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this createAssociation(int|string $meetingId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this createAssociation(int|string $meetingId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this removeAssociation(int|string $meetingId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this removeAssociation(int|string $meetingId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of meetings by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of meetings by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of meetings.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of meetings.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of meetings by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of meetings by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of meetings.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of meetings.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search meetings.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search meetings.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two meetings with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two meetings with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method static $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $hubspotId) (Handler) Use Create or Update meeting if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 * @method $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $hubspotId) (Handler) Use Create or Update meeting if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/meetings
 *
 */
class EngagementMeetingHubspot extends Hubspot
{
    protected string $resource = "engagements-meetings-v3";

    protected int $version = 3;
}
