<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this getAll() Read a page of calls. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this getAll() Read a page of calls. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this get(int|string $callId) Read an note identified by {callId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this get(int|string $callId) Read an note identified by {callId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this update(int|string $callId, BaseBodyBuilder|array $requestBody) Perform a partial update of an note identified by {callId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this update(int|string $callId, BaseBodyBuilder|array $requestBody) Perform a partial update of an note identified by {callId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this delete(int|string $callId) Move an note identified by {callId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this delete(int|string $callId) Move an note identified by {callId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this getAssociations(int|string $callId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this getAssociations(int|string $callId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this createAssociation(int|string $callId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this createAssociation(int|string $callId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this removeAssociation(int|string $callId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this removeAssociation(int|string $callId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of calls by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of calls by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of calls by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of calls by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search calls.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two calls with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two calls with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/calls
 *
 */
class EngagementCallHubspot extends Hubspot
{
    protected string $resource = "engagements-calls-v3";

    protected int $version = 3;
}
