<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<object> getAll(int|string $objectType) Return all pipelines for the object type specified by {objectType}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<object> getAll(int|string $objectType) Return all pipelines for the object type specified by {objectType}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<null> get(int|string $objectType, int|string $pipelineId) Return a single pipeline object identified by its unique {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<null> get(int|string $objectType, int|string $pipelineId) Return a single pipeline object identified by its unique {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<null> create(int|string $objectType, array $requestBody) Create a new pipeline with the provided property values.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<null> create(int|string $objectType, array $requestBody) Create a new pipeline with the provided property values.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<null> update(int|string $objectType, int|string $pipelineId, array $requestBody) Perform a partial update of the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<null> update(int|string $objectType, int|string $pipelineId, array $requestBody) Perform a partial update of the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<null> replace(int|string $objectType, int|string $pipelineId, array $requestBody) Replace all the properties of an existing pipeline with the values provided.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<null> replace(int|string $objectType, int|string $pipelineId, array $requestBody) Replace all the properties of an existing pipeline with the values provided.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<null> delete(int|string $objectType, int|string $pipelineId) Archive the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<null> delete(int|string $objectType, int|string $pipelineId) Archive the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<object> getAllStages(int|string $objectType, int|string $pipelineId) Return all the stages associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<object> getAllStages(int|string $objectType, int|string $pipelineId) Return all the stages associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<null> getStage(int|string $objectType, int|string $pipelineId, int|string $stageId) Return the stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<null> getStage(int|string $objectType, int|string $pipelineId, int|string $stageId) Return the stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<null> createStage(int|string $objectType, int|string $pipelineId, array $requestBody) Create a new stage associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<null> createStage(int|string $objectType, int|string $pipelineId, array $requestBody) Create a new stage associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<null> updateStage(int|string $objectType, int|string $pipelineId, int|string $stageId, array $requestBody) Perform a partial update of the pipeline stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<null> updateStage(int|string $objectType, int|string $pipelineId, int|string $stageId, array $requestBody) Perform a partial update of the pipeline stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<null> replaceStage(int|string $objectType, int|string $pipelineId, int|string $stageId, array $requestBody) Replace all the properties of an existing pipeline stage with the values provided. The updated stage will be returned in the response.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<null> replaceStage(int|string $objectType, int|string $pipelineId, int|string $stageId, array $requestBody) Replace all the properties of an existing pipeline stage with the values provided. The updated stage will be returned in the response.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method static self<null> deleteStage(int|string $objectType, int|string $pipelineId, int|string $stageId) Archive the pipeline stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 * @method self<null> deleteStage(int|string $objectType, int|string $pipelineId, int|string $stageId) Archive the pipeline stage identified by {stageId} associated with the pipeline identified by {pipelineId}.
 * See https://developers.hubspot.com/docs/api/crm/pipelines
 *
 */
class PipelineHubspot extends Hubspot
{
    protected string $resource = "pipelines-v3";

    protected int $version = 3;
}