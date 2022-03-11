<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;

/**
 * @link https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this getAll() Returns the details for the published version of each table defined in an account, including column definitions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this getAll() Returns the details for the published version of each table defined in an account, including column definitions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this getAllDraft() Returns the details for each draft table defined in the specified account, including column definitions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this getAllDraft() Returns the details for each draft table defined in the specified account, including column definitions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this get(int|string $tableIdOrName) Returns the details for the published version of the specified table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this get(int|string $tableIdOrName) Returns the details for the published version of the specified table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this getDraft(int|string $tableIdOrName) Get the details for the draft version of a specific HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this getDraft(int|string $tableIdOrName) Get the details for the draft version of a specific HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this create(array $requestBody) Creates a new draft HubDB table given a JSON schema. The table name and label should be unique for each account.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this create(array $requestBody) Creates a new draft HubDB table given a JSON schema. The table name and label should be unique for each account.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this delete(int|string $tableIdOrName) Archive (soft delete) an existing HubDB table. This archives both the published and draft versions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this delete(int|string $tableIdOrName) Archive (soft delete) an existing HubDB table. This archives both the published and draft versions.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this update(int|string $tableIdOrName, array $requestBody) Update an existing HubDB table. 
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this update(int|string $tableIdOrName, array $requestBody) Update an existing HubDB table. 
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this clone(int|string $tableIdOrName, array $requestBody) Clone an existing HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this clone(int|string $tableIdOrName, array $requestBody) Clone an existing HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this exportDraftToCsv(int|string $tableIdOrName) Exports the draft version of a table to CSV format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this exportDraftToCsv(int|string $tableIdOrName) Exports the draft version of a table to CSV format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this exportDraftToXlsx(int|string $tableIdOrName) Exports the draft version of a table to XLSX format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this exportDraftToXlsx(int|string $tableIdOrName) Exports the draft version of a table to XLSX format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this exportToCsv(int|string $tableIdOrName) Exports the published version of a table to CSV format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this exportToCsv(int|string $tableIdOrName) Exports the published version of a table to CSV format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this exportToXlsx(int|string $tableIdOrName) Exports the published version of a table to XLSX format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this exportToXlsx(int|string $tableIdOrName) Exports the published version of a table to XLSX format.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this importToDraft(int|string $tableIdOrName, array $requestBody) Import the contents of a CSV file into an existing HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this importToDraft(int|string $tableIdOrName, array $requestBody) Import the contents of a CSV file into an existing HubDB table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this publish(int|string $tableIdOrName) Publishes the table by copying the data and table schema changes from draft version to the published version, meaning any website pages using data from the table will be updated.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this publish(int|string $tableIdOrName) Publishes the table by copying the data and table schema changes from draft version to the published version, meaning any website pages using data from the table will be updated.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this resetDraft(int|string $tableIdOrName, array $requestBody) Replaces the data in the draft version of the table with values from the published version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this resetDraft(int|string $tableIdOrName, array $requestBody) Replaces the data in the draft version of the table with values from the published version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this unpublish(int|string $tableIdOrName) Unpublishes the table, meaning any website pages using data from the table will not render any data.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this unpublish(int|string $tableIdOrName) Unpublishes the table, meaning any website pages using data from the table will not render any data.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this getAllRows(int|string $tableIdOrName) Returns a set of rows in the published version of the specified table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this getAllRows(int|string $tableIdOrName) Returns a set of rows in the published version of the specified table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this getAllRowsDraft(int|string $tableIdOrName) Returns rows in the draft version of the specified table. Row results can be filtered and sorted.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this getAllRowsDraft(int|string $tableIdOrName) Returns rows in the draft version of the specified table. Row results can be filtered and sorted.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this getRow(int|string $tableIdOrName, int|string $rowId) Get a single row by ID from a table's published version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this getRow(int|string $tableIdOrName, int|string $rowId) Get a single row by ID from a table's published version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this getRowDraft(int|string $tableIdOrName, int|string $rowId) Get a single row by ID from a table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this getRowDraft(int|string $tableIdOrName, int|string $rowId) Get a single row by ID from a table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this createRow(int|string $tableIdOrName, array $requestBody) Add a new row to a HubDB table. New rows will be added to the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this createRow(int|string $tableIdOrName, array $requestBody) Add a new row to a HubDB table. New rows will be added to the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this updateRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Sparse updates a single row in the table's draft version. All the column values need not be specified. 
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this updateRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Sparse updates a single row in the table's draft version. All the column values need not be specified. 
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this replaceRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Replace a single row in the table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this replaceRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Replace a single row in the table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this deleteRow(int|string $tableIdOrName, int|string $rowId) Permanently deletes a row from a table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this deleteRow(int|string $tableIdOrName, int|string $rowId) Permanently deletes a row from a table's draft version.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this cloneRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Clones a single row in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this cloneRow(int|string $tableIdOrName, int|string $rowId, array $requestBody) Clones a single row in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this batchReadRows(int|string $tableIdOrName, array $requestBody) Returns rows in the published version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this batchReadRows(int|string $tableIdOrName, array $requestBody) Returns rows in the published version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this batchReadRowsDraft(int|string $tableIdOrName, array $requestBody) Returns rows in the draft version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this batchReadRowsDraft(int|string $tableIdOrName, array $requestBody) Returns rows in the draft version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this batchCloneRows(int|string $tableIdOrName, array $requestBody) Clones rows in the draft version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this batchCloneRows(int|string $tableIdOrName, array $requestBody) Clones rows in the draft version of the specified table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this batchCreateRows(int|string $tableIdOrName, array $requestBody) Creates rows in the draft version of the specified table, given an array of row objects.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this batchCreateRows(int|string $tableIdOrName, array $requestBody) Creates rows in the draft version of the specified table, given an array of row objects.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this batchDeleteRows(int|string $tableIdOrName, array $requestBody) Permanently deletes rows from the draft version of the table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this batchDeleteRows(int|string $tableIdOrName, array $requestBody) Permanently deletes rows from the draft version of the table, given a set of row ids.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this batchReplaceRows(int|string $tableIdOrName, array $requestBody) Replaces multiple rows as a batch in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this batchReplaceRows(int|string $tableIdOrName, array $requestBody) Replaces multiple rows as a batch in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method static $this batchUpdateRows(int|string $tableIdOrName, array $requestBody) Updates multiple rows as a batch in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 * @method $this batchUpdateRows(int|string $tableIdOrName, array $requestBody) Updates multiple rows as a batch in the draft version of the table.
 * See https://developers.hubspot.com/docs/api/cms/hubdb
 *
 */
class HubDbHubspot extends Hubspot
{
    protected string $resource = "hub-db-v3";

    protected int $version = 3;
}
