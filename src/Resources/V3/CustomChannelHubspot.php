<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link -
 *
 * @method static self<null> createChannelAccount(int|string $channelId, array $requestBody) Create channel account in portal.
 * See -
 *
 * @method self<null> createChannelAccount(int|string $channelId, array $requestBody) Create channel account in portal.
 * See -
 *
 * @method static self<null> postMessage(int|string $channelId, array $requestBody) Post Message in thread.
 * See -
 *
 * @method self<null> postMessage(int|string $channelId, array $requestBody) Post Message in thread.
 * See -
 *
 */
class CustomChannelHubspot extends Hubspot
{
    protected string $resource = "custom-channels-v3";

    protected int $version = 3;
}