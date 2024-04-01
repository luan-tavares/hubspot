<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<object> getAll(int|string $object_type) Get all pipelines for a specified object type
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/get_pipelines_for_object_type
 *
 * @method self<object> getAll(int|string $object_type) Get all pipelines for a specified object type
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/get_pipelines_for_object_type
 *
 * @method static self<null> get(int|string $object_type, int|string $pipeline_id) Get an existing pipeline
 *
 * @method self<null> get(int|string $object_type, int|string $pipeline_id) Get an existing pipeline
 *
 * @method static self<null> create(int|string $object_type, array $requestBody) Create a new pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/create_new_pipeline
 *
 * @method self<null> create(int|string $object_type, array $requestBody) Create a new pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/create_new_pipeline
 *
 * @method static self<null> update(int|string $object_type, int|string $pipeline_id, array $requestBody) Update an existing pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/update_pipeline
 *
 * @method self<null> update(int|string $object_type, int|string $pipeline_id, array $requestBody) Update an existing pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/update_pipeline
 *
 * @method static self<null> delete(int|string $object_type, int|string $pipeline_id) Delete an existing pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/delete_pipeline
 *
 * @method self<null> delete(int|string $object_type, int|string $pipeline_id) Delete an existing pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/delete_pipeline
 *
 */
class PipelineHubspot extends Hubspot
{
    protected string $resource = "pipelines-v1";

    protected int $version = 1;
}