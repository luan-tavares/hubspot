<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

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
class WorkflowV3Hubspot extends Hubspot
{
    protected string $resource = "workflows-v3";
}
