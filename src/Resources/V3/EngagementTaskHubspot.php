<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this getAll() Read a page of tasks. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this getAll() Read a page of tasks. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this get(int|string $taskId) Read an note identified by {taskId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this get(int|string $taskId) Read an note identified by {taskId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this update(int|string $taskId, BaseBodyBuilder|array $requestBody) Perform a partial update of an note identified by {taskId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this update(int|string $taskId, BaseBodyBuilder|array $requestBody) Perform a partial update of an note identified by {taskId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this delete(int|string $taskId) Move an note identified by {taskId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this delete(int|string $taskId) Move an note identified by {taskId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this getAssociations(int|string $taskId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this getAssociations(int|string $taskId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this createAssociation(int|string $taskId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this createAssociation(int|string $taskId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this removeAssociation(int|string $taskId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this removeAssociation(int|string $taskId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of tasks by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of tasks by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of tasks.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of tasks.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of tasks by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of tasks by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of tasks.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of tasks.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search tasks.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search tasks.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two tasks with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two tasks with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method static $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $hubspotId) (Handler) Use Create or Update yask if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 * @method $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $hubspotId) (Handler) Use Create or Update yask if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/tasks
 *
 */
class EngagementTaskHubspot extends Hubspot
{
    protected string $resource = "engagements-tasks-v3";

    protected int $version = 3;
}
