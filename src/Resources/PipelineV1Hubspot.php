<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getAll(int|string $object_type) Get all pipelines for a specified object type
 * See 
 *
 * @method $this getAll(int|string $object_type) Get all pipelines for a specified object type
 * See 
 *
 * @method static $this get(int|string $object_type, int|string $pipeline_id) Get an existing pipeline
 * See 
 *
 * @method $this get(int|string $object_type, int|string $pipeline_id) Get an existing pipeline
 * See 
 *
 * @method static $this create(int|string $object_type, array $requestBody) Create a new pipeline
 * See 
 *
 * @method $this create(int|string $object_type, array $requestBody) Create a new pipeline
 * See 
 *
 * @method static $this update(int|string $object_type, int|string $pipeline_id, array $requestBody) Update an existing pipeline
 * See 
 *
 * @method $this update(int|string $object_type, int|string $pipeline_id, array $requestBody) Update an existing pipeline
 * See 
 *
 * @method static $this delete(int|string $object_type, int|string $pipeline_id) Delete an existing pipeline
 * See 
 *
 * @method $this delete(int|string $object_type, int|string $pipeline_id) Delete an existing pipeline
 * See 
 *
 */
class PipelineV1Hubspot extends Hubspot
{
    protected string $resource = "pipelines-v1";
}
