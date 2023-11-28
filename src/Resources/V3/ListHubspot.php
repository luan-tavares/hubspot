<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this fetch() Fetch multiple lists in a single request by ILS list ID. The response will include the definitions of all lists that exist for the listIds provided.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this fetch() Fetch multiple lists in a single request by ILS list ID. The response will include the definitions of all lists that exist for the listIds provided.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this fetchByName(int|string $objectTypeId, int|string $listName) Fetch a single list by list name and object type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this fetchByName(int|string $objectTypeId, int|string $listName) Fetch a single list by list name and object type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this get(int|string $listId) Fetch a single list by ILS list ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this get(int|string $listId) Fetch a single list by ILS list ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a new list with the provided object list definition..
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a new list with the provided object list definition..
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this updateDefinition(int|string $listId, BaseBodyBuilder|array $requestBody) Update the filter branch definition of a DYNAMIC list. Once updated, the list memberships will be re-evaluated and updated to match the new definition.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this updateDefinition(int|string $listId, BaseBodyBuilder|array $requestBody) Update the filter branch definition of a DYNAMIC list. Once updated, the list memberships will be re-evaluated and updated to match the new definition.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this updateName(int|string $listId, string $newName) Update the name of a list. The name must be globally unique relative to all other public lists in the portal.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this updateName(int|string $listId, string $newName) Update the name of a list. The name must be globally unique relative to all other public lists in the portal.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this delete(int|string $listId) Delete a List.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this delete(int|string $listId) Delete a List.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this restore(int|string $listId, BaseBodyBuilder|array $requestBody) Restore a previously deleted list by ILS list ID. Deleted lists are eligible to be restored up-to 90-days after the list has been deleted.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this restore(int|string $listId, BaseBodyBuilder|array $requestBody) Restore a previously deleted list by ILS list ID. Deleted lists are eligible to be restored up-to 90-days after the list has been deleted.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search lists by list name or page through all lists by providing an empty query value.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search lists by list name or page through all lists by providing an empty query value.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this getMemberships(int|string $listId) Fetch List Memberships Ordered by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this getMemberships(int|string $listId) Fetch List Memberships Ordered by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this deleteAllMemberships(int|string $listId) Remove all of the records from a list. Note: The list is not deleted.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this deleteAllMemberships(int|string $listId) Remove all of the records from a list. Note: The list is not deleted.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this addMemberships(int|string $listId, BaseBodyBuilder|array $requestBody) Add the records provided to the list. Records that do not exist or that are already members of the list are ignored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this addMemberships(int|string $listId, BaseBodyBuilder|array $requestBody) Add the records provided to the list. Records that do not exist or that are already members of the list are ignored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this addAndRemoveMemberships(int|string $listId, BaseBodyBuilder|array $requestBody) Add and/or remove records that have already been created in the system to and/or from a list.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this addAndRemoveMemberships(int|string $listId, BaseBodyBuilder|array $requestBody) Add and/or remove records that have already been created in the system to and/or from a list.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this addMembershipsFromList(int|string $listId, int|string $sourceListId, BaseBodyBuilder|array $requestBody) Add All Records from a Source List to a Destination List.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this addMembershipsFromList(int|string $listId, int|string $sourceListId, BaseBodyBuilder|array $requestBody) Add All Records from a Source List to a Destination List.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static $this deleteMemberships(int|string $listId, BaseBodyBuilder|array $requestBody) Remove the records provided from the list. Records that do not exist or that are not members of the list are ignored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method $this deleteMemberships(int|string $listId, BaseBodyBuilder|array $requestBody) Remove the records provided from the list. Records that do not exist or that are not members of the list are ignored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 */
class ListHubspot extends Hubspot
{
    protected string $resource = "lists-v3";

    protected int $version = 3;
}