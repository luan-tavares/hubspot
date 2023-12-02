<?php

namespace LTL\Hubspot\Resources\V3\Interfaces;

use LTL\Hubspot\HubspotInterface;
use LTL\HubspotRequestBody\Resources as Body;

/**
 * @method static $this getAll() Read a page of tasks. Control what is returned via the properties query param.
 *
 * @method $this getAll() Read a page of tasks. Control what is returned via the properties query param.
 *
 * @method static $this get(int|string $taskId) Read an note identified by {taskId}.
 *
 * @method $this get(int|string $taskId) Read an note identified by {taskId}.
 *
 * @method static $this create(array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 *
 * @method $this create(array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 *
 * @method static $this update(int|string $taskId, array $requestBody) Perform a partial update of an note identified by {taskId}.
 *
 * @method $this update(int|string $taskId, array $requestBody) Perform a partial update of an note identified by {taskId}.
 *
 * @method static $this delete(int|string $taskId) Move an note identified by {taskId} to the recycling bin.
 *
 * @method $this delete(int|string $taskId) Move an note identified by {taskId} to the recycling bin.
 *
 * @method static $this getAssociations(int|string $taskId, int|string $toObjectType) List associations of a note by type.
 *
 * @method $this getAssociations(int|string $taskId, int|string $toObjectType) List associations of a note by type.
 *
 * @method static $this createAssociation(int|string $taskId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 *
 * @method $this createAssociation(int|string $taskId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 *
 * @method static $this removeAssociation(int|string $taskId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 *
 * @method $this removeAssociation(int|string $taskId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 *
 * @method static $this batchDelete(array $requestBody) Archive a batch of tasks by ID.
 *
 * @method $this batchDelete(array $requestBody) Archive a batch of tasks by ID.
 *
 * @method static $this batchCreate(array $requestBody) Create a batch of tasks.
 *
 * @method $this batchCreate(array $requestBody) Create a batch of tasks.
 *
 * @method static $this batchRead(array $requestBody) Read a batch of tasks by internal ID, or unique property values.
 *
 * @method $this batchRead(array $requestBody) Read a batch of tasks by internal ID, or unique property values.
 *
 * @method static $this batchUpdate(array $requestBody) Update a batch of tasks.
 *
 * @method $this batchUpdate(array $requestBody) Update a batch of tasks.
 *
 * @method static $this search(array $requestBody) Search tasks.
 *
 * @method $this search(array $requestBody) Search tasks.
 *
 * @method static $this merge(array $requestBody) Merge two tasks with same type
 *
 * @method $this merge(array $requestBody) Merge two tasks with same type
 *
 * @method static $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update yask if id exists.
 *
 * @method $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update yask if id exists.
 *
 * @method static $this importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 *
 * @method $this importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 *
 */
interface EngagementInterface extends HubspotInterface
{
}