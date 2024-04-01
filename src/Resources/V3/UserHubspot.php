<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static self<object> getAll() Read a page of users.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method self<object> getAll() Read a page of users.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static self<null> get(int|string $userId) Read an user identified by {userId}.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method self<null> get(int|string $userId) Read an user identified by {userId}.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static self<null> create(array $requestBody) Create a user with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method self<null> create(array $requestBody) Create a user with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static self<null> update(int|string $userId, array $requestBody) Perform a update in a user identified by {userId}.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method self<null> update(int|string $userId, array $requestBody) Perform a update in a user identified by {userId}.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static self<null> delete(int|string $userId) Move an user identified by {userId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method self<null> delete(int|string $userId) Move an user identified by {userId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static self<object> getRoles() Retrieves the roles on an account.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method self<object> getRoles() Retrieves the roles on an account.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method static self<object> getTeams() See details about this account's teams.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 * @method self<object> getTeams() See details about this account's teams.
 * See https://developers.hubspot.com/docs/api/settings/user-provisioning
 *
 */
class UserHubspot extends Hubspot
{
    protected string $resource = "users-v3";

    protected int $version = 3;
}