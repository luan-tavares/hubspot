<?php

namespace LTL\Hubspot\Resources\V4;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<object> getAll(int|string $appId) Returns a list of all custom workflow actions.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<object> getAll(int|string $appId) Returns a list of all custom workflow actions.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> get(int|string $appId, int|string $actionId) Returns a single custom workflow action with the specified ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> get(int|string $appId, int|string $actionId) Returns a single custom workflow action with the specified ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> create(int|string $appId, array $requestBody) Creates a new custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> create(int|string $appId, array $requestBody) Creates a new custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> update(int|string $appId, int|string $actionId, array $requestBody) Updates a custom workflow action with new values for the specified fields.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> update(int|string $appId, int|string $actionId, array $requestBody) Updates a custom workflow action with new values for the specified fields.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> delete(int|string $appId, int|string $actionId) Archives a single custom workflow action with the specified ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> delete(int|string $appId, int|string $actionId) Archives a single custom workflow action with the specified ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<object> getAllFunctions(int|string $appId, int|string $actionId) Returns a list of all functions that are associated with the given custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<object> getAllFunctions(int|string $appId, int|string $actionId) Returns a list of all functions that are associated with the given custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> getFunction(int|string $appId, int|string $actionId, int|string $functionType) Returns the given function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> getFunction(int|string $appId, int|string $actionId, int|string $functionType) Returns the given function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> createOrReplaceFunction(int|string $appId, int|string $actionId, int|string $functionType, array $requestBody) Creates or replaces a function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> createOrReplaceFunction(int|string $appId, int|string $actionId, int|string $functionType, array $requestBody) Creates or replaces a function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> deleteFunction(int|string $appId, int|string $actionId, int|string $functionType) Delete a function for a custom workflow action. This will remove the function itself as well as removing the association between the function and the custom action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> deleteFunction(int|string $appId, int|string $actionId, int|string $functionType) Delete a function for a custom workflow action. This will remove the function itself as well as removing the association between the function and the custom action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> getFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId) Returns the given function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> getFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId) Returns the given function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> createOrReplaceFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId, array $requestBody) Creates or replaces a function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> createOrReplaceFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId, array $requestBody) Creates or replaces a function for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> deleteFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId) Delete a function for a custom workflow action. This will remove the function itself as well as removing the association between the function and the custom action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> deleteFunctionAction(int|string $appId, int|string $actionId, int|string $functionType, int|string $functionId) Delete a function for a custom workflow action. This will remove the function itself as well as removing the association between the function and the custom action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<object> getAllRevisions(int|string $appId, int|string $actionId) Returns a list of revisions for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<object> getAllRevisions(int|string $appId, int|string $actionId) Returns a list of revisions for a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> getRevision(int|string $appId, int|string $actionId, int|string $revisionId) Returns the given version of a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> getRevision(int|string $appId, int|string $actionId, int|string $revisionId) Returns the given version of a custom workflow action.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> completeCallback(int|string $callbackId, array $requestBody) Completes the given action callback using app oAuth.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> completeCallback(int|string $callbackId, array $requestBody) Completes the given action callback using app oAuth.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method static self<null> batchCompleteCallbacks(array $requestBody) Completes the given action callbacks using app oAuth.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 * @method self<null> batchCompleteCallbacks(array $requestBody) Completes the given action callbacks using app oAuth.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/automation/v4/actions
 *
 */
class WorkflowExtensionHubspot extends Hubspot
{
    protected string $resource = "workflows-extension-v4";

    protected int $version = 4;
}