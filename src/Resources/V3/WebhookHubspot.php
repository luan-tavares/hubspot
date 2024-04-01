<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/webhooks
 *
 * @method static self<object, null> getSettings(int|string $appId) Returns the current state of webhook settings for the given app. These settings include the app's configured target URL and max concurrency limit.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method self<object, null> getSettings(int|string $appId) Returns the current state of webhook settings for the given app. These settings include the app's configured target URL and max concurrency limit.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method static self<object, null> updateSettings(int|string $appId, array $requestBody) Used to set the webhook target URL and max concurrency limit for the given app.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method self<object, null> updateSettings(int|string $appId, array $requestBody) Used to set the webhook target URL and max concurrency limit for the given app.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method static self<object, null> deleteSettings(int|string $appId) Resets webhook target URL to empty, and max concurrency limit to 0 for the given app.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method self<object, null> deleteSettings(int|string $appId) Resets webhook target URL to empty, and max concurrency limit to 0 for the given app.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method static self<array<int, object>, object> getAll(int|string $appId) Returns full details for all existing subscriptions for the given app.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method self<array<int, object>, object> getAll(int|string $appId) Returns full details for all existing subscriptions for the given app.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method static self<object, null> create(int|string $appId, array $requestBody) Creates a new webhook subscription for the given app. Each subscription in an app must be unique.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method self<object, null> create(int|string $appId, array $requestBody) Creates a new webhook subscription for the given app. Each subscription in an app must be unique.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method static self<array<int, object>, object> batchUpdate(int|string $appId, array $requestBody) Activates or deactivates target app subscriptions.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method self<array<int, object>, object> batchUpdate(int|string $appId, array $requestBody) Activates or deactivates target app subscriptions.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method static self<object, null> get(int|string $appId, int|string $subscriptionId) Returns details about a subscription.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method self<object, null> get(int|string $appId, int|string $subscriptionId) Returns details about a subscription.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method static self<object, null> update(int|string $appId, int|string $subscriptionId, array $requestBody) Updates the details for an existing subscription.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method self<object, null> update(int|string $appId, int|string $subscriptionId, array $requestBody) Updates the details for an existing subscription.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method static self<object, null> delete(int|string $appId, int|string $subscriptionId) Permanently deletes a subscription. This cannot be undone.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 * @method self<object, null> delete(int|string $appId, int|string $subscriptionId) Permanently deletes a subscription. This cannot be undone.
 * See https://developers.hubspot.com/docs/api/webhooks
 *
 */
class WebhookHubspot extends Hubspot
{
    protected string $resource = "webhooks-v3";

    protected int $version = 3;
}