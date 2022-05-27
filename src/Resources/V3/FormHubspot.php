<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static $this getAll() Returns a list of forms based on the search filters. By default, it returns the first 20 hubspot forms.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method $this getAll() Returns a list of forms based on the search filters. By default, it returns the first 20 hubspot forms.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static $this get(int|string $formId) Returns a form based on the form ID provided.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method $this get(int|string $formId) Returns a form based on the form ID provided.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) Add a new hubspot form.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Add a new hubspot form.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static $this update(int|string $formId, BaseBodyBuilder|array $requestBody) Update all fields of a hubspot form definition.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method $this update(int|string $formId, BaseBodyBuilder|array $requestBody) Update all fields of a hubspot form definition.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static $this partialUpdate(int|string $formId, BaseBodyBuilder|array $requestBody) Update some of the form definition components.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method $this partialUpdate(int|string $formId, BaseBodyBuilder|array $requestBody) Update some of the form definition components.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static $this delete(int|string $formId) Archive a form definition. New submissions will not be accepted and the form definition will be permanently deleted after 3 months.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method $this delete(int|string $formId) Archive a form definition. New submissions will not be accepted and the form definition will be permanently deleted after 3 months.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 */
class FormHubspot extends Hubspot
{
    protected string $resource = "forms-v3";

    protected int $version = 3;
}
