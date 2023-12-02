<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;

/**
 * @method static $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflows
 *
 * @method $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflows
 *
 * @method static $this get(int|string $workflowId) 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflow
 *
 * @method $this get(int|string $workflowId) 
 * See https://legacydocs.hubspot.com/docs/methods/workflows/v3/get_workflow
 *
 */
class WorkflowHubspot extends Hubspot
{
    protected string $resource = "workflows-v3";

    protected int $version = 3;
}