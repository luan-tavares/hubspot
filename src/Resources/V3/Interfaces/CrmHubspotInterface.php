<?php

namespace LTL\Hubspot\Resources\V3\Interfaces;

use LTL\Hubspot\HubspotInterface;
use LTL\HubspotRequestBody\Resources as Body;

/**
 * @method static $this getAll() Read a page.
 *
 * @method $this getAll() Read a page.
 *
 * @method static $this get(int|string $taskId) Get one.
 *
 * @method $this get(int|string $taskId) Get one.
 *
 * @method static $this create(array|Body\HubspotCrmCreateBody $requestBody) Create.
 *
 * @method $this create(array|Body\HubspotCrmCreateBody $requestBody) Create.
 *
 * @method static $this update(int|string $taskId, array|Body\HubspotCrmUpdateBody $requestBody) Update.
 *
 * @method $this update(int|string $taskId, array|Body\HubspotCrmUpdateBody $requestBody) Update.
 *
 * @method static $this delete(int|string $taskId) Delete.
 *
 * @method $this delete(int|string $taskId) Delete.
 *
 * @method static $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch.
 *
 * @method $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch.
 *
 * @method static $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch.
 *
 * @method $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch.
 *
 * @method static $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch.
 *
 * @method $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch.
 *
 * @method static $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch.
 *
 * @method $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch.
 *
 * @method static $this search(array|Body\HubspotSearchBody $requestBody) Search.
 *
 * @method $this search(array|Body\HubspotSearchBody $requestBody) Search.
 *
 * @method static $this merge(array $requestBody) Merge two objects.
 *
 * @method $this merge(array $requestBody) Merge two objects.
 *
 * @method static $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update if id exists.
 *
 * @method $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update if id exists.
 *
 * @method static $this importAll(callable $fn) (Handler) Import All using offset and getAll
 *
 * @method $this importAll(callable $fn) (Handler) Import All using offset and getAll
 *
 */
interface CrmHubspotInterface extends HubspotInterface
{
}