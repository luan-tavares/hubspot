<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method static $this getAll() Returns a paged list of active imports for this account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method $this getAll() Returns a paged list of active imports for this account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method static $this get(int|string $importId) A complete summary of an import record, including any updates.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method $this get(int|string $importId) A complete summary of an import record, including any updates.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method static $this start(BaseBodyBuilder|array $requestBody) Begins importing data from the specified file resources.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method $this start(BaseBodyBuilder|array $requestBody) Begins importing data from the specified file resources.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method static $this cancel(int|string $importId, BaseBodyBuilder|array $requestBody) This allows a developer to cancel an active import.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method $this cancel(int|string $importId, BaseBodyBuilder|array $requestBody) This allows a developer to cancel an active import.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method static $this errors(int|string $importId) Get import error.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 * @method $this errors(int|string $importId) Get import error.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/imports
 *
 */
class ImportHubspot extends Hubspot
{
    protected string $resource = "imports-v3";

    protected int $version = 3;
}
