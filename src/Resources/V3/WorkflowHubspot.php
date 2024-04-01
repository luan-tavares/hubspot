<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflows
 *
 * @method self<null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflows
 *
 * @method static self<null> get(int|string $workflowId) 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflow
 *
 * @method self<null> get(int|string $workflowId) 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflow
 *
 */
class WorkflowHubspot extends Hubspot
{
    protected string $resource = "workflows-v3";

    protected int $version = 3;
}