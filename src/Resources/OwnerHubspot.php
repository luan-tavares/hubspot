<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() Read a page of owners.
* @method $this getAll() Read a page of owners.
* @method static $this get(int|string $ownerId) Read an owner identified by {ownerId}.
* @method $this get(int|string $ownerId) Read an owner identified by {ownerId}.
 */
class OwnerHubspot extends Hubspot
{
    protected string $resource = "owners-v3";
}
