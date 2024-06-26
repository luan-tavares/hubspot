<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method static self<object> getAll(int|string $appId) Returns a list of cards for a given app.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method self<object> getAll(int|string $appId) Returns a list of cards for a given app.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method static self<null> get(int|string $appId, int|string $cardId) Returns the definition for a card with the given ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method self<null> get(int|string $appId, int|string $cardId) Returns the definition for a card with the given ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method static self<null> create(int|string $appId, array $requestBody) Defines a new card that will become active on an account when this app is installed.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method self<null> create(int|string $appId, array $requestBody) Defines a new card that will become active on an account when this app is installed.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method static self<null> update(int|string $appId, int|string $cardId, array $requestBody) Update a card definition with new details.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method self<null> update(int|string $appId, int|string $cardId, array $requestBody) Update a card definition with new details.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method static self<null> delete(int|string $appId, int|string $cardId) Permanently deletes a card definition with the given ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method self<null> delete(int|string $appId, int|string $cardId) Permanently deletes a card definition with the given ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method static self<null> getSampleCard() Returns an example card detail response.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 * @method self<null> getSampleCard() Returns an example card detail response.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/extensions/cards
 *
 */
class CrmExtensionHubspot extends Hubspot
{
    protected string $resource = "crm-extension-v3";

    protected int $version = 3;
}