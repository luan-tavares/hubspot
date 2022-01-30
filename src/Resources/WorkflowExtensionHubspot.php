<?php

namespace LTL\HubspotApi\Resources;

use LTL\HubspotApi\Hubspot;

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
