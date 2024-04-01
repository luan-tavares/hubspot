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
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<array<int, object>, object> getAll(int|string $appId) Use this to list all event templates owned by your app.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<array<int, object>, object> getAll(int|string $appId) Use this to list all event templates owned by your app.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> get(int|string $appId, int|string $eventTemplateId) 
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> get(int|string $appId, int|string $eventTemplateId) 
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> create(int|string $appId, array $requestBody) Event templates define the general structure for a custom timeline event. 
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> create(int|string $appId, array $requestBody) Event templates define the general structure for a custom timeline event. 
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> update(int|string $appId, int|string $eventTemplateId, array $requestBody) Updates an existing template and its tokens.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> update(int|string $appId, int|string $eventTemplateId, array $requestBody) Updates an existing template and its tokens.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> delete(int|string $appId, int|string $eventTemplateId) This will delete the event template. All associated events will be removed from search results and the timeline UI.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> delete(int|string $appId, int|string $eventTemplateId) This will delete the event template. All associated events will be removed from search results and the timeline UI.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> createToken(int|string $appId, int|string $eventTemplateId, array $requestBody) Adds a token to an existing event template.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> createToken(int|string $appId, int|string $eventTemplateId, array $requestBody) Adds a token to an existing event template.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> updateToken(int|string $appId, int|string $eventTemplateId, int|string $tokenName, array $requestBody) This will update the existing token on an event template. Name and type can't be changed on existing tokens.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> updateToken(int|string $appId, int|string $eventTemplateId, int|string $tokenName, array $requestBody) This will update the existing token on an event template. Name and type can't be changed on existing tokens.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> deleteToken(int|string $appId, int|string $eventTemplateId, int|string $tokenName) This will remove the token from an existing template.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> deleteToken(int|string $appId, int|string $eventTemplateId, int|string $tokenName) This will remove the token from an existing template.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> createEvent(array $requestBody) Creates an instance of a timeline event based on an event template.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> createEvent(array $requestBody) Creates an instance of a timeline event based on an event template.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> batchCreateEvent(array $requestBody) Creates multiple instances of timeline events based on an event template.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> batchCreateEvent(array $requestBody) Creates multiple instances of timeline events based on an event template.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> getEvent(int|string $eventTemplateId, int|string $eventId) This returns the previously created event. It contains all existing info for the event, but not necessarily the CRM object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> getEvent(int|string $eventTemplateId, int|string $eventId) This returns the previously created event. It contains all existing info for the event, but not necessarily the CRM object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> getEventDetail(int|string $eventTemplateId, int|string $eventId) This will take the detailTemplate from the event template and return an object rendering the specified event.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> getEventDetail(int|string $eventTemplateId, int|string $eventId) This will take the detailTemplate from the event template and return an object rendering the specified event.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> getEventHtmlHeader(int|string $eventTemplateId, int|string $eventId) This will take either the headerTemplate from the event template and render for the specified event as HTML.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> getEventHtmlHeader(int|string $eventTemplateId, int|string $eventId) This will take either the headerTemplate from the event template and render for the specified event as HTML.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method static self<object, null> getEventHtmlDetail(int|string $eventTemplateId, int|string $eventId) This will take either the detailTemplate from the event template and render for the specified event as HTML.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 * @method self<object, null> getEventHtmlDetail(int|string $eventTemplateId, int|string $eventId) This will take either the detailTemplate from the event template and render for the specified event as HTML.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/timeline
 *
 */
class TimelineExtensionHubspot extends Hubspot
{
    protected string $resource = "timeline-extension-v3";

    protected int $version = 3;
}