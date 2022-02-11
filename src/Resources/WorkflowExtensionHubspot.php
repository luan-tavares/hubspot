<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @link https://developers.hubspot.com/docs/api/automation/custom-workflow-actions
 *
 * @method static $this completeCallback(int|string $callbackId, array $requestBody) Completes the given action callback using app oAuth.
 * See https://developers.hubspot.com/docs/api/automation/custom-workflow-actions
 *
 * @method $this completeCallback(int|string $callbackId, array $requestBody) Completes the given action callback using app oAuth.
 * See https://developers.hubspot.com/docs/api/automation/custom-workflow-actions
 *
 * @method static $this batchCompleteCallbacks(array $requestBody) Completes the given action callbacks using app oAuth.
 * See https://developers.hubspot.com/docs/api/automation/custom-workflow-actions
 *
 * @method $this batchCompleteCallbacks(array $requestBody) Completes the given action callbacks using app oAuth.
 * See https://developers.hubspot.com/docs/api/automation/custom-workflow-actions
 *
 * @method static $this completeCallbackApp(int|string $appId, int|string $callbackId, array $requestBody) Completes the given action callback using account apikey.
 * See https://developers.hubspot.com/docs/api/automation/custom-workflow-actions
 *
 * @method $this completeCallbackApp(int|string $appId, int|string $callbackId, array $requestBody) Completes the given action callback using account apikey.
 * See https://developers.hubspot.com/docs/api/automation/custom-workflow-actions
 *
 * @method static $this batchCompleteCallbacksApp(int|string $appId, array $requestBody) Completes the given action callbacks using account apikey.
 * See https://developers.hubspot.com/docs/api/automation/custom-workflow-actions
 *
 * @method $this batchCompleteCallbacksApp(int|string $appId, array $requestBody) Completes the given action callbacks using account apikey.
 * See https://developers.hubspot.com/docs/api/automation/custom-workflow-actions
 *
 */
class WorkflowExtensionHubspot extends Hubspot
{
    protected string $resource = "workflows-extension-v4";
}
