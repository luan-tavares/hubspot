<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this completeCallback(int|string $callbackId, array $requestBody) Completes the given action callback.
* @method $this completeCallback(int|string $callbackId, array $requestBody) Completes the given action callback.
* @method static $this batchCompleteCallbacks(array $requestBody) Completes the given action callbacks.
* @method $this batchCompleteCallbacks(array $requestBody) Completes the given action callbacks.
 */
class WorkflowExtensionHubspot extends Hubspot
{
    protected string $resource = "workflows-extension-v4";
}
