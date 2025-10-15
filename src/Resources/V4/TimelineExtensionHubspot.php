<?php

namespace LTL\Hubspot\Resources\V4;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/apps/developer-platform/add-features/app-events/send-event-occurrences
 *
 * @method static self<null> create(array $requestBody) Event templates define the general structure for a custom timeline event. 
 * See https://developers.hubspot.com/docs/apps/developer-platform/add-features/app-events/send-event-occurrences
 *
 * @method self<null> create(array $requestBody) Event templates define the general structure for a custom timeline event. 
 * See https://developers.hubspot.com/docs/apps/developer-platform/add-features/app-events/send-event-occurrences
 *
 */
class TimelineExtensionHubspot extends Hubspot
{
    protected string $resource = "timeline-extension-v4";

    protected int $version = 4;
}