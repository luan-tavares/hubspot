<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getAll() Read a page of users.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method $this getAll() Read a page of users.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static $this get(int|string $userId) Read an user identified by {userId}.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method $this get(int|string $userId) Read an user identified by {userId}.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static $this create(array $requestBody) Create a user with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method $this create(array $requestBody) Create a user with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static $this update(int|string $userId, array $requestBody) Perform a update in a user identified by {userId}.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method $this update(int|string $userId, array $requestBody) Perform a update in a user identified by {userId}.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static $this delete(int|string $userId) Move an user identified by {userId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method $this delete(int|string $userId) Move an user identified by {userId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static $this getRoles() Retrieves the roles on an account.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method $this getRoles() Retrieves the roles on an account.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static $this getTeams() See details about this account's teams.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method $this getTeams() See details about this account's teams.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 */
class UserHubspot extends Hubspot
{
    protected string $resource = "users-v3";
}
