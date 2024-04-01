<?php

namespace LTL\Hubspot\Resources\V3\Interfaces;

use LTL\Hubspot\HubspotInterface;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @method static self<object, null> getAll() Read a page.
 *
 * @method self<object, null> getAll() Read a page.
 *
 * @method static self<object, null> get(int|string $taskId) Get one.
 *
 * @method self<object, null> get(int|string $taskId) Get one.
 *
 * @method static self<object, null> create(array|Body\HubspotCrmCreateBody $requestBody) Create.
 *
 * @method self<object, null> create(array|Body\HubspotCrmCreateBody $requestBody) Create.
 *
 * @method static self<object, null> update(int|string $taskId, array|Body\HubspotCrmUpdateBody $requestBody) Update.
 *
 * @method self<object, null> update(int|string $taskId, array|Body\HubspotCrmUpdateBody $requestBody) Update.
 *
 * @method static self<object, null> delete(int|string $taskId) Delete.
 *
 * @method self<object, null> delete(int|string $taskId) Delete.
 *
 * @method static self<object, null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch.
 *
 * @method self<object, null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch.
 *
 * @method static self<object, null> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch.
 *
 * @method self<object, null> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch.
 *
 * @method static self<object, null> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch.
 *
 * @method self<object, null> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch.
 *
 * @method static self<object, null> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch.
 *
 * @method self<object, null> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch.
 *
 * @method static self<object, null> search(array|Body\HubspotSearchBody $requestBody) Search.
 *
 * @method self<object, null> search(array|Body\HubspotSearchBody $requestBody) Search.
 *
 * @method static self<object, null> merge(array $requestBody) Merge two objects.
 *
 * @method self<object, null> merge(array $requestBody) Merge two objects.
 *
 * @method static self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update if id exists.
 *
 * @method self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update if id exists.
 *
 * @method static self<object, null> importAll(callable $fn) (Handler) Import All using offset and getAll
 *
 * @method self<object, null> importAll(callable $fn) (Handler) Import All using offset and getAll
 *
 */
interface CrmHubspotInterface extends HubspotInterface
{
}