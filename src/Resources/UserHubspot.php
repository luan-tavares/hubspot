<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() Read a page of users.
* @method $this getAll() Read a page of users.
* @method static $this get(int|string $userId) Read an user identified by {userId}.
* @method $this get(int|string $userId) Read an user identified by {userId}.
* @method static $this create(array $requestBody) Create a user with the given properties and return a copy of the object, including the ID.
* @method $this create(array $requestBody) Create a user with the given properties and return a copy of the object, including the ID.
* @method static $this update(int|string $userId, array $requestBody) Perform a update in a user identified by {userId}.
* @method $this update(int|string $userId, array $requestBody) Perform a update in a user identified by {userId}.
* @method static $this delete(int|string $userId) Move an user identified by {userId} to the recycling bin.
* @method $this delete(int|string $userId) Move an user identified by {userId} to the recycling bin.
* @method static $this getRoles() Retrieves the roles on an account.
* @method $this getRoles() Retrieves the roles on an account.
* @method static $this getTeams() See details about this account's teams.
* @method $this getTeams() See details about this account's teams.
 */
class UserHubspot extends Hubspot
{
    protected string $resource = "users-v3";
}
