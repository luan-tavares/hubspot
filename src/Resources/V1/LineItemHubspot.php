<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @method static self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/get-all-line-items
 *
 * @method self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/get-all-line-items
 *
 * @method static self<object, null> get(int|string $id) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/get_line_item_by_id
 *
 * @method self<object, null> get(int|string $id) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/get_line_item_by_id
 *
 * @method static self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/create-line-item
 *
 * @method self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/create-line-item
 *
 * @method static self<object, null> update(int|string $id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/update-line-item
 *
 * @method self<object, null> update(int|string $id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/update-line-item
 *
 * @method static self<object, null> delete(int|string $id) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/delete-line-item
 *
 * @method self<object, null> delete(int|string $id) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/delete-line-item
 *
 * @method static self<object, null> getGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-get-line-items
 *
 * @method self<object, null> getGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-get-line-items
 *
 * @method static self<object, null> batchCreate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-create-line-items
 *
 * @method self<object, null> batchCreate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-create-line-items
 *
 * @method static self<object, null> batchUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-update-line-items
 *
 * @method self<object, null> batchUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-update-line-items
 *
 * @method static self<object, null> batchDelete(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-delete-line-items
 *
 * @method self<object, null> batchDelete(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-delete-line-items
 *
 */
class LineItemHubspot extends Hubspot
{
    protected string $resource = "line-items-v1";

    protected int $version = 1;
}