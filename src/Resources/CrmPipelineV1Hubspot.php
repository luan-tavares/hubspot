<?php

namespace LTL\HubspotApi\Resources;

use LTL\HubspotApi\Hubspot;

/**
* @method static $this getAll(int|string $object_type) Get all pipelines for a specified object type
* @method $this getAll(int|string $object_type) Get all pipelines for a specified object type
* @method static $this get(int|string $object_type, int|string $pipeline_id) Get an existing pipeline
* @method $this get(int|string $object_type, int|string $pipeline_id) Get an existing pipeline
* @method static $this create(int|string $object_type, array $requestBody) Create a new pipeline
* @method $this create(int|string $object_type, array $requestBody) Create a new pipeline
* @method static $this update(int|string $object_type, int|string $pipeline_id, array $requestBody) Update an existing pipeline
* @method $this update(int|string $object_type, int|string $pipeline_id, array $requestBody) Update an existing pipeline
* @method static $this delete(int|string $object_type, int|string $pipeline_id) Delete an existing pipeline
* @method $this delete(int|string $object_type, int|string $pipeline_id) Delete an existing pipeline
 */
class CrmPipelineV1Hubspot extends Hubspot
{
    protected string $resource = "crm-pipelines-v1";
}
