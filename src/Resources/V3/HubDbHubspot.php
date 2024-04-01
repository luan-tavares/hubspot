<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<object> getAll() Returns the details for the published version of each table defined in an account, including column definitions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<object> getAll() Returns the details for the published version of each table defined in an account, including column definitions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<object> getAllDraft() Returns the details for each draft table defined in the specified account, including column definitions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<object> getAllDraft() Returns the details for each draft table defined in the specified account, including column definitions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> get(int|string $tableIdOrName) Returns the details for the published version of the specified table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> get(int|string $tableIdOrName) Returns the details for the published version of the specified table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> getDraft(int|string $tableIdOrName) Get the details for the draft version of a specific HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> getDraft(int|string $tableIdOrName) Get the details for the draft version of a specific HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> create(array $requestBody) Creates a new draft HubDB table given a JSON schema. The table name and label should be unique for each account.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> create(array $requestBody) Creates a new draft HubDB table given a JSON schema. The table name and label should be unique for each account.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> delete(int|string $tableIdOrName) Archive (soft delete) an existing HubDB table. This archives both the published and draft versions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> delete(int|string $tableIdOrName) Archive (soft delete) an existing HubDB table. This archives both the published and draft versions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> update(int|string $tableIdOrName, array $requestBody) Update an existing HubDB table. 
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> update(int|string $tableIdOrName, array $requestBody) Update an existing HubDB table. 
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> clone(int|string $tableIdOrName, array $requestBody) Clone an existing HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> clone(int|string $tableIdOrName, array $requestBody) Clone an existing HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> exportDraftToCsv(int|string $tableIdOrName) Exports the draft version of a table to CSV format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> exportDraftToCsv(int|string $tableIdOrName) Exports the draft version of a table to CSV format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> exportDraftToXlsx(int|string $tableIdOrName) Exports the draft version of a table to XLSX format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> exportDraftToXlsx(int|string $tableIdOrName) Exports the draft version of a table to XLSX format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> exportToCsv(int|string $tableIdOrName) Exports the published version of a table to CSV format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> exportToCsv(int|string $tableIdOrName) Exports the published version of a table to CSV format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> exportToXlsx(int|string $tableIdOrName) Exports the published version of a table to XLSX format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> exportToXlsx(int|string $tableIdOrName) Exports the published version of a table to XLSX format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> importToDraft(int|string $tableIdOrName, array $requestBody) Import the contents of a CSV file into an existing HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> importToDraft(int|string $tableIdOrName, array $requestBody) Import the contents of a CSV file into an existing HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> publish(int|string $tableIdOrName) Publishes the table by copying the data and table schema changes from draft version to the published version, meaning any website pages using data from the table will be updated.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> publish(int|string $tableIdOrName) Publishes the table by copying the data and table schema changes from draft version to the published version, meaning any website pages using data from the table will be updated.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> resetDraft(int|string $tableIdOrName, array $requestBody) Replaces the data in the draft version of the table with values from the published version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> resetDraft(int|string $tableIdOrName, array $requestBody) Replaces the data in the draft version of the table with values from the published version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> unpublish(int|string $tableIdOrName) Unpublishes the table, meaning any website pages using data from the table will not render any data.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> unpublish(int|string $tableIdOrName) Unpublishes the table, meaning any website pages using data from the table will not render any data.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<object> getAllRows(int|string $tableIdOrName) Returns a set of rows in the published version of the specified table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<object> getAllRows(int|string $tableIdOrName) Returns a set of rows in the published version of the specified table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<object> getAllRowsDraft(int|string $tableIdOrName) Returns rows in the draft version of the specified table. Row results can be filtered and sorted.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<object> getAllRowsDraft(int|string $tableIdOrName) Returns rows in the draft version of the specified table. Row results can be filtered and sorted.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> getRow(int|string $tableIdOrName, int|string $rowId) Get a single row by ID from a table's published version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> getRow(int|string $tableIdOrName, int|string $rowId) Get a single row by ID from a table's published version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> getRowDraft(int|string $tableIdOrName, int|string $rowId) Get a single row by ID from a table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> getRowDraft(int|string $tableIdOrName, int|string $rowId) Get a single row by ID from a table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> createRow(int|string $tableIdOrName, array $requestBody) Add a new row to a HubDB table. New rows will be added to the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> createRow(int|string $tableIdOrName, array $requestBody) Add a new row to a HubDB table. New rows will be added to the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> updateRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Sparse updates a single row in the table's draft version. All the column values need not be specified. 
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> updateRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Sparse updates a single row in the table's draft version. All the column values need not be specified. 
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> replaceRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Replace a single row in the table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> replaceRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Replace a single row in the table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> deleteRow(int|string $tableIdOrName, int|string $rowId) Permanently deletes a row from a table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> deleteRow(int|string $tableIdOrName, int|string $rowId) Permanently deletes a row from a table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> cloneRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Clones a single row in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> cloneRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Clones a single row in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<object> batchReadRows(int|string $tableIdOrName, array $requestBody) Returns rows in the published version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<object> batchReadRows(int|string $tableIdOrName, array $requestBody) Returns rows in the published version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<object> batchReadRowsDraft(int|string $tableIdOrName, array $requestBody) Returns rows in the draft version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<object> batchReadRowsDraft(int|string $tableIdOrName, array $requestBody) Returns rows in the draft version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<object> batchCloneRows(int|string $tableIdOrName, array $requestBody) Clones rows in the draft version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<object> batchCloneRows(int|string $tableIdOrName, array $requestBody) Clones rows in the draft version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<object> batchCreateRows(int|string $tableIdOrName, array $requestBody) Creates rows in the draft version of the specified table, given an array of row objects.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<object> batchCreateRows(int|string $tableIdOrName, array $requestBody) Creates rows in the draft version of the specified table, given an array of row objects.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<null> batchDeleteRows(int|string $tableIdOrName, array $requestBody) Permanently deletes rows from the draft version of the table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<null> batchDeleteRows(int|string $tableIdOrName, array $requestBody) Permanently deletes rows from the draft version of the table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<object> batchReplaceRows(int|string $tableIdOrName, array $requestBody) Replaces multiple rows as a batch in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<object> batchReplaceRows(int|string $tableIdOrName, array $requestBody) Replaces multiple rows as a batch in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static self<object> batchUpdateRows(int|string $tableIdOrName, array $requestBody) Updates multiple rows as a batch in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method self<object> batchUpdateRows(int|string $tableIdOrName, array $requestBody) Updates multiple rows as a batch in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 */
class HubDbHubspot extends Hubspot
{
    protected string $resource = "hub-db-v3";

    protected int $version = 3;
}