<?php

namespace LTL\Hubspot\Resources\V3\Interfaces;

use LTL\Hubspot\HubspotInterface;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> getAll() Read a page of tasks. Control what is returned via the properties query param.
 *
 * @method self<null> getAll() Read a page of tasks. Control what is returned via the properties query param.
 *
 * @method static self<null> get(int|string $taskId) Read an note identified by {taskId}.
 *
 * @method self<null> get(int|string $taskId) Read an note identified by {taskId}.
 *
 * @method static self<null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 *
 * @method self<null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 *
 * @method static self<null> update(int|string $taskId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an note identified by {taskId}.
 *
 * @method self<null> update(int|string $taskId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an note identified by {taskId}.
 *
 * @method static self<null> delete(int|string $taskId) Move an note identified by {taskId} to the recycling bin.
 *
 * @method self<null> delete(int|string $taskId) Move an note identified by {taskId} to the recycling bin.
 *
 * @method static self<null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of tasks by ID.
 *
 * @method self<null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of tasks by ID.
 *
 * @method static self<null> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of tasks.
 *
 * @method self<null> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of tasks.
 *
 * @method static self<null> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of tasks by internal ID, or unique property values.
 *
 * @method self<null> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of tasks by internal ID, or unique property values.
 *
 * @method static self<null> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of tasks.
 *
 * @method self<null> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of tasks.
 *
 * @method static self<null> search(array|Body\HubspotSearchBody $requestBody) Search tasks.
 *
 * @method self<null> search(array|Body\HubspotSearchBody $requestBody) Search tasks.
 *
 * @method static self<null> merge(array $requestBody) Merge two tasks with same type
 *
 * @method self<null> merge(array $requestBody) Merge two tasks with same type
 *
 * @method static self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update yask if id exists.
 *
 * @method self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update yask if id exists.
 *
 * @method static self<null> importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 *
 * @method self<null> importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 *
 */
interface EngagementHubspotInterface extends HubspotInterface
{
}