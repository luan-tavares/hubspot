<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<object> fetch() Fetch multiple lists in a single request by ILS list ID. The response will include the definitions of all lists that exist for the listIds provided.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<object> fetch() Fetch multiple lists in a single request by ILS list ID. The response will include the definitions of all lists that exist for the listIds provided.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<object> fetchByName(int|string $objectTypeId, int|string $listName) Fetch a single list by list name and object type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<object> fetchByName(int|string $objectTypeId, int|string $listName) Fetch a single list by list name and object type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<null> get(int|string $listId) Fetch a single list by ILS list ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<null> get(int|string $listId) Fetch a single list by ILS list ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<null> create(array $requestBody) Create a new list with the provided object list definition..
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<null> create(array $requestBody) Create a new list with the provided object list definition..
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<null> updateDefinition(int|string $listId, array $requestBody) Update the filter branch definition of a DYNAMIC list. Once updated, the list memberships will be re-evaluated and updated to match the new definition.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<null> updateDefinition(int|string $listId, array $requestBody) Update the filter branch definition of a DYNAMIC list. Once updated, the list memberships will be re-evaluated and updated to match the new definition.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<null> updateName(int|string $listId, string|int $newName) Update the name of a list. The name must be globally unique relative to all other public lists in the portal.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<null> updateName(int|string $listId, string|int $newName) Update the name of a list. The name must be globally unique relative to all other public lists in the portal.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<null> delete(int|string $listId) Delete a List.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<null> delete(int|string $listId) Delete a List.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<null> restore(int|string $listId, array $requestBody) Restore a previously deleted list by ILS list ID. Deleted lists are eligible to be restored up-to 90-days after the list has been deleted.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<null> restore(int|string $listId, array $requestBody) Restore a previously deleted list by ILS list ID. Deleted lists are eligible to be restored up-to 90-days after the list has been deleted.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<object> search(array $requestBody) Search lists by list name or page through all lists by providing an empty query value.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<object> search(array $requestBody) Search lists by list name or page through all lists by providing an empty query value.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<object> getMemberships(int|string $listId) Fetch List Memberships Ordered by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<object> getMemberships(int|string $listId) Fetch List Memberships Ordered by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<null> deleteAllMemberships(int|string $listId) Remove all of the records from a list. Note: The list is not deleted.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<null> deleteAllMemberships(int|string $listId) Remove all of the records from a list. Note: The list is not deleted.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<null> addMemberships(int|string $listId, array $requestBody) Add the records provided to the list. Records that do not exist or that are already members of the list are ignored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<null> addMemberships(int|string $listId, array $requestBody) Add the records provided to the list. Records that do not exist or that are already members of the list are ignored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<null> addAndRemoveMemberships(int|string $listId, array $requestBody) Add and/or remove records that have already been created in the system to and/or from a list.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<null> addAndRemoveMemberships(int|string $listId, array $requestBody) Add and/or remove records that have already been created in the system to and/or from a list.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<null> addMembershipsFromList(int|string $listId, int|string $sourceListId, array $requestBody) Add All Records from a Source List to a Destination List.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<null> addMembershipsFromList(int|string $listId, int|string $sourceListId, array $requestBody) Add All Records from a Source List to a Destination List.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method static self<null> deleteMemberships(int|string $listId, array $requestBody) Remove the records provided from the list. Records that do not exist or that are not members of the list are ignored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 * @method self<null> deleteMemberships(int|string $listId, array $requestBody) Remove the records provided from the list. Records that do not exist or that are not members of the list are ignored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/lists
 *
 */
class ListHubspot extends Hubspot
{
    protected string $resource = "lists-v3";

    protected int $version = 3;
}