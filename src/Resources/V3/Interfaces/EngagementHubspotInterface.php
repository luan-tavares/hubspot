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
 * @method static $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 *
 * @method $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 *
 * @method static $this update(int|string $taskId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an note identified by {taskId}.
 *
 * @method $this update(int|string $taskId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an note identified by {taskId}.
 *
 * @method static $this delete(int|string $taskId) Move an note identified by {taskId} to the recycling bin.
 *
 * @method $this delete(int|string $taskId) Move an note identified by {taskId} to the recycling bin.
 *
 * @method static $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of tasks by ID.
 *
 * @method $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of tasks by ID.
 *
 * @method static $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of tasks.
 *
 * @method $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of tasks.
 *
 * @method static $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of tasks by internal ID, or unique property values.
 *
 * @method $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of tasks by internal ID, or unique property values.
 *
 * @method static $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of tasks.
 *
 * @method $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of tasks.
 *
 * @method static $this search(array|Body\HubspotSearchBody $requestBody) Search tasks.
 *
 * @method $this search(array|Body\HubspotSearchBody $requestBody) Search tasks.
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
interface EngagementHubspotInterface extends HubspotInterface
{
}