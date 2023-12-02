<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;

/**
 * @link https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this getAll(int|string $objectType) Return all pipelines for the object type specified by {objectType}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this getAll(int|string $objectType) Return all pipelines for the object type specified by {objectType}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this get(int|string $objectType, int|string $pipelineId) Return a single pipeline object identified by its unique {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this get(int|string $objectType, int|string $pipelineId) Return a single pipeline object identified by its unique {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this create(int|string $objectType, array $requestBody) Create a new pipeline with the provided property values.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this create(int|string $objectType, array $requestBody) Create a new pipeline with the provided property values.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this update(int|string $objectType, int|string $pipelineId, array $requestBody) Perform a partial update of the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this update(int|string $objectType, int|string $pipelineId, array $requestBody) Perform a partial update of the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this replace(int|string $objectType, int|string $pipelineId, array $requestBody) Replace all the properties of an existing pipeline with the values provided.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this replace(int|string $objectType, int|string $pipelineId, array $requestBody) Replace all the properties of an existing pipeline with the values provided.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this delete(int|string $objectType, int|string $pipelineId) Archive the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this delete(int|string $objectType, int|string $pipelineId) Archive the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this getAllStages(int|string $objectType, int|string $pipelineId) Return all the stages associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this getAllStages(int|string $objectType, int|string $pipelineId) Return all the stages associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this getStage(int|string $objectType, int|string $pipelineId, int|string $stageId) Return the stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this getStage(int|string $objectType, int|string $pipelineId, int|string $stageId) Return the stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this createStage(int|string $objectType, int|string $pipelineId, array $requestBody) Create a new stage associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this createStage(int|string $objectType, int|string $pipelineId, array $requestBody) Create a new stage associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this updateStage(int|string $objectType, int|string $pipelineId, int|string $stageId, array $requestBody) Perform a partial update of the pipeline stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this updateStage(int|string $objectType, int|string $pipelineId, int|string $stageId, array $requestBody) Perform a partial update of the pipeline stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this replaceStage(int|string $objectType, int|string $pipelineId, int|string $stageId, array $requestBody) Replace all the properties of an existing pipeline stage with the values provided. The updated stage will be returned in the response.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this replaceStage(int|string $objectType, int|string $pipelineId, int|string $stageId, array $requestBody) Replace all the properties of an existing pipeline stage with the values provided. The updated stage will be returned in the response.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static $this deleteStage(int|string $objectType, int|string $pipelineId, int|string $stageId) Archive the pipeline stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method $this deleteStage(int|string $objectType, int|string $pipelineId, int|string $stageId) Archive the pipeline stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 */
class PipelineHubspot extends Hubspot
{
    protected string $resource = "pipelines-v3";

    protected int $version = 3;
}