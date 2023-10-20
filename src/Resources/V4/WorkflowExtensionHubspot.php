<?php

namespace LTL\Hubspot\Resources\V4;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this getAll(int|string $appId) Returns a list of all custom workflow actions.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this getAll(int|string $appId) Returns a list of all custom workflow actions.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this get(int|string $appId, int|string $actionId) Returns a single custom workflow action with the specified ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this get(int|string $appId, int|string $actionId) Returns a single custom workflow action with the specified ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this create(int|string $appId, BaseBodyBuilder|array $requestBody) Creates a new custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this create(int|string $appId, BaseBodyBuilder|array $requestBody) Creates a new custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this update(int|string $appId, int|string $actionId, BaseBodyBuilder|array $requestBody) Updates a custom workflow action with new values for the specified fields.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this update(int|string $appId, int|string $actionId, BaseBodyBuilder|array $requestBody) Updates a custom workflow action with new values for the specified fields.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this delete(int|string $appId, int|string $actionId) Archives a single custom workflow action with the specified ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this delete(int|string $appId, int|string $actionId) Archives a single custom workflow action with the specified ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this getAllFunctions(int|string $appId, int|string $actionId) Returns a list of all functions that are associated with the given custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this getAllFunctions(int|string $appId, int|string $actionId) Returns a list of all functions that are associated with the given custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this getFunction(int|string $appId, int|string $actionId, int|string $functionType) Returns the given function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this getFunction(int|string $appId, int|string $actionId, int|string $functionType) Returns the given function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this createOrReplaceFunction(int|string $appId, int|string $actionId, int|string $functionType, BaseBodyBuilder|array $requestBody) Creates or replaces a function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this createOrReplaceFunction(int|string $appId, int|string $actionId, int|string $functionType, BaseBodyBuilder|array $requestBody) Creates or replaces a function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this deleteFunction(int|string $appId, int|string $actionId, int|string $functionType) Delete a function for a custom workflow action. This will remove the function itself as well as removing the association between the function and the custom action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this deleteFunction(int|string $appId, int|string $actionId, int|string $functionType) Delete a function for a custom workflow action. This will remove the function itself as well as removing the association between the function and the custom action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this getFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId) Returns the given function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this getFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId) Returns the given function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this createOrReplaceFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId, BaseBodyBuilder|array $requestBody) Creates or replaces a function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this createOrReplaceFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId, BaseBodyBuilder|array $requestBody) Creates or replaces a function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this deleteFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId) Delete a function for a custom workflow action. This will remove the function itself as well as removing the association between the function and the custom action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this deleteFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId) Delete a function for a custom workflow action. This will remove the function itself as well as removing the association between the function and the custom action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this getAllRevisions(int|string $appId, int|string $actionId) Returns a list of revisions for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this getAllRevisions(int|string $appId, int|string $actionId) Returns a list of revisions for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this getRevision(int|string $appId, int|string $actionId, int|string $revisionId) Returns the given version of a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this getRevision(int|string $appId, int|string $actionId, int|string $revisionId) Returns the given version of a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this completeCallback(int|string $callbackId, BaseBodyBuilder|array $requestBody) Completes the given action callback using app oAuth.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this completeCallback(int|string $callbackId, BaseBodyBuilder|array $requestBody) Completes the given action callback using app oAuth.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static $this batchCompleteCallbacks(BaseBodyBuilder|array $requestBody) Completes the given action callbacks using app oAuth.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method $this batchCompleteCallbacks(BaseBodyBuilder|array $requestBody) Completes the given action callbacks using app oAuth.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 */
class WorkflowExtensionHubspot extends Hubspot
{
    protected string $resource = "workflows-extension-v4";

    protected int $version = 4;
}