<?php

namespace LTL\Hubspot\Resources\V3\Interfaces;

use LTL\Hubspot\HubspotInterface;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> getAll() Read a page.
 *
 * @method self<null> getAll() Read a page.
 *
 * @method static self<null> get(int|string $taskId) Get one.
 *
 * @method self<null> get(int|string $taskId) Get one.
 *
 * @method static self<null> create(array|Body\HubspotCrmCreateBody $requestBody) Create.
 *
 * @method self<null> create(array|Body\HubspotCrmCreateBody $requestBody) Create.
 *
 * @method static self<null> update(int|string $taskId, array|Body\HubspotCrmUpdateBody $requestBody) Update.
 *
 * @method self<null> update(int|string $taskId, array|Body\HubspotCrmUpdateBody $requestBody) Update.
 *
 * @method static self<null> delete(int|string $taskId) Delete.
 *
 * @method self<null> delete(int|string $taskId) Delete.
 *
 * @method static self<null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch.
 *
 * @method self<null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch.
 *
 * @method static self<null> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch.
 *
 * @method self<null> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch.
 *
 * @method static self<null> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch.
 *
 * @method self<null> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch.
 *
 * @method static self<null> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch.
 *
 * @method self<null> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch.
 *
 * @method static self<null> search(array|Body\HubspotSearchBody $requestBody) Search.
 *
 * @method self<null> search(array|Body\HubspotSearchBody $requestBody) Search.
 *
 * @method static self<null> merge(array $requestBody) Merge two objects.
 *
 * @method self<null> merge(array $requestBody) Merge two objects.
 *
 * @method static self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update if id exists.
 *
 * @method self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update if id exists.
 *
 * @method static self<null> importAll(callable $fn) (Handler) Import All using offset and getAll
 *
 * @method self<null> importAll(callable $fn) (Handler) Import All using offset and getAll
 *
 */
interface CrmHubspotInterface extends HubspotInterface
{
}