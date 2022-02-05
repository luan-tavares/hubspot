<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getAll(int|string $object_type) Get all pipelines for a specified object type
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/get_pipelines_for_object_type
 *
 * @method $this getAll(int|string $object_type) Get all pipelines for a specified object type
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/get_pipelines_for_object_type
 *
 * @method static $this get(int|string $object_type, int|string $pipeline_id) Get an existing pipeline
 *
 * @method $this get(int|string $object_type, int|string $pipeline_id) Get an existing pipeline
 *
 * @method static $this create(int|string $object_type, array $requestBody) Create a new pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/create_new_pipeline
 *
 * @method $this create(int|string $object_type, array $requestBody) Create a new pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/create_new_pipeline
 *
 * @method static $this update(int|string $object_type, int|string $pipeline_id, array $requestBody) Update an existing pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/update_pipeline
 *
 * @method $this update(int|string $object_type, int|string $pipeline_id, array $requestBody) Update an existing pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/update_pipeline
 *
 * @method static $this delete(int|string $object_type, int|string $pipeline_id) Delete an existing pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/delete_pipeline
 *
 * @method $this delete(int|string $object_type, int|string $pipeline_id) Delete an existing pipeline
 * See https://legacydocs.hubspot.com/docs/methods/pipelines/delete_pipeline
 *
 */
class PipelineV1Hubspot extends Hubspot
{
    protected string $resource = "pipelines-v1";
}
