<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this completeCallback(int|string $callbackId, array $requestBody) 
* @method $this completeCallback(int|string $callbackId, array $requestBody) 
* @method static $this completeBatchCallbacks(array $requestBody) 
* @method $this completeBatchCallbacks(array $requestBody) 
 */
class WorkflowExtensionHubspot extends Hubspot
{
    protected string $resource = "workflows-extension";
}
