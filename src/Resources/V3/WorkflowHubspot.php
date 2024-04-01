<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @method static self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflows
 *
 * @method self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflows
 *
 * @method static self<object, null> get(int|string $workflowId) 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflow
 *
 * @method self<object, null> get(int|string $workflowId) 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflow
 *
 */
class WorkflowHubspot extends Hubspot
{
    protected string $resource = "workflows-v3";

    protected int $version = 3;
}