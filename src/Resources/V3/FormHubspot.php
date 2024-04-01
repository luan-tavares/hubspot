<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static self<object> getAll() Returns a list of forms based on the search filters. By default, it returns the first 20 hubspot forms.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method self<object> getAll() Returns a list of forms based on the search filters. By default, it returns the first 20 hubspot forms.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static self<null> get(int|string $formId) Returns a form based on the form ID provided.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method self<null> get(int|string $formId) Returns a form based on the form ID provided.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static self<null> create(array $requestBody) Add a new hubspot form.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method self<null> create(array $requestBody) Add a new hubspot form.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static self<null> update(int|string $formId, array $requestBody) Update all fields of a hubspot form definition.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method self<null> update(int|string $formId, array $requestBody) Update all fields of a hubspot form definition.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static self<null> partialUpdate(int|string $formId, array $requestBody) Update some of the form definition components.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method self<null> partialUpdate(int|string $formId, array $requestBody) Update some of the form definition components.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static self<null> delete(int|string $formId) Archive a form definition. New submissions will not be accepted and the form definition will be permanently deleted after 3 months.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method self<null> delete(int|string $formId) Archive a form definition. New submissions will not be accepted and the form definition will be permanently deleted after 3 months.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method static self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update form if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 * @method self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update form if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/marketing/v3/forms
 *
 */
class FormHubspot extends Hubspot
{
    protected string $resource = "forms-v3";

    protected int $version = 3;
}