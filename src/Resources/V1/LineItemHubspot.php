<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @method static $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/get-all-line-items
 *
 * @method $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/get-all-line-items
 *
 * @method static $this get(int|string $id) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/get_line_item_by_id
 *
 * @method $this get(int|string $id) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/get_line_item_by_id
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/create-line-item
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/create-line-item
 *
 * @method static $this update(int|string $id, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/update-line-item
 *
 * @method $this update(int|string $id, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/update-line-item
 *
 * @method static $this delete(int|string $id) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/delete-line-item
 *
 * @method $this delete(int|string $id) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/delete-line-item
 *
 * @method static $this getGroup(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-get-line-items
 *
 * @method $this getGroup(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-get-line-items
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-create-line-items
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-create-line-items
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-update-line-items
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-update-line-items
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-delete-line-items
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/line-items/batch-delete-line-items
 *
 */
class LineItemHubspot extends Hubspot
{
    protected string $resource = "line-items-v1";

    protected int $version = 1;
}