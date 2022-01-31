<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() 
* @method $this getAll() 
* @method static $this get(int|string $workflowId) 
* @method $this get(int|string $workflowId) 
 */
class WorkflowV3Hubspot extends Hubspot
{
    protected string $resource = "workflows-v3";
}
