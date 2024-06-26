<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method static self<object> getAll() Returns a paged list of active imports for this account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method self<object> getAll() Returns a paged list of active imports for this account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method static self<null> get(int|string $importId) A complete summary of an import record, including any updates.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method self<null> get(int|string $importId) A complete summary of an import record, including any updates.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method static self<null> start(array $requestBody) Begins importing data from the specified file resources.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method self<null> start(array $requestBody) Begins importing data from the specified file resources.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method static self<null> cancel(int|string $importId, array $requestBody) This allows a developer to cancel an active import.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method self<null> cancel(int|string $importId, array $requestBody) This allows a developer to cancel an active import.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method static self<null> errors(int|string $importId) Get import error.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method self<null> errors(int|string $importId) Get import error.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 */
class ImportHubspot extends Hubspot
{
    protected string $resource = "imports-v3";

    protected int $version = 3;
}