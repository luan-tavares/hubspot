<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/crm/owners
 *
 * @method static self<object> getAll() Read a page of owners.
 * See https://developers.hubspot.com/docs/api/crm/owners
 *
 * @method self<object> getAll() Read a page of owners.
 * See https://developers.hubspot.com/docs/api/crm/owners
 *
 * @method static self<null> get(int|string $ownerId) Read an owner identified by {ownerId}.
 * See https://developers.hubspot.com/docs/api/crm/owners
 *
 * @method self<null> get(int|string $ownerId) Read an owner identified by {ownerId}.
 * See https://developers.hubspot.com/docs/api/crm/owners
 *
 * @method static self<null> importAll(callable $fn) (Handler) Import All Contacts using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/owners
 *
 * @method self<null> importAll(callable $fn) (Handler) Import All Contacts using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/owners
 *
 */
class OwnerHubspot extends Hubspot
{
    protected string $resource = "owners-v3";

    protected int $version = 3;
}