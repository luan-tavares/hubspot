<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getAll() Read a page of owners.
 * See https://developers.hubspot.com/docs/api/crm/owners
 *
 * @method $this getAll() Read a page of owners.
 * See https://developers.hubspot.com/docs/api/crm/owners
 *
 * @method static $this get(int|string $ownerId) Read an owner identified by {ownerId}.
 * See https://developers.hubspot.com/docs/api/crm/owners
 *
 * @method $this get(int|string $ownerId) Read an owner identified by {ownerId}.
 * See https://developers.hubspot.com/docs/api/crm/owners
 *
 */
class OwnerHubspot extends Hubspot
{
    protected string $resource = "owners-v3";
}
