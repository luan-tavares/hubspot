<?php

namespace LTL\Hubspot\Resources\V2;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> submit(int|string $portalId, int|string $formGuid, array $requestBody) Submit data to a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/submit_form
 *
 * @method self<null> submit(int|string $portalId, int|string $formGuid, array $requestBody) Submit data to a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/submit_form
 *
 * @method static self<null> getSubmissions(int|string $formGuid) Get submissions for a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/get-submissions-for-a-form
 *
 * @method self<null> getSubmissions(int|string $formGuid) Get submissions for a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/get-submissions-for-a-form
 *
 * @method static self<null> getFileUploaded(int|string $fileId) Get a file uploaded via form
 * See https://legacydocs.hubspot.com/docs/methods/form-integrations/v1/uploaded-files/signed-url-redirect
 *
 * @method self<null> getFileUploaded(int|string $fileId) Get a file uploaded via form
 * See https://legacydocs.hubspot.com/docs/methods/form-integrations/v1/uploaded-files/signed-url-redirect
 *
 * @method static self<null> create(array $requestBody) Create a new form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/create_form
 *
 * @method self<null> create(array $requestBody) Create a new form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/create_form
 *
 * @method static self<null> update(int|string $form_guid, array $requestBody) Update an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/update_form
 *
 * @method self<null> update(int|string $form_guid, array $requestBody) Update an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/update_form
 *
 * @method static self<null> get(int|string $form_guid) Get a form by its unique ID
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_form
 *
 * @method self<null> get(int|string $form_guid) Get a form by its unique ID
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_form
 *
 * @method static self<null> getFields(int|string $form_guid) Get all fields from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_fields
 *
 * @method self<null> getFields(int|string $form_guid) Get all fields from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_fields
 *
 * @method static self<null> getField(int|string $form_guid, int|string $field_name) Get a single field from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_field
 *
 * @method self<null> getField(int|string $form_guid, int|string $field_name) Get a single field from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_field
 *
 * @method static self<null> getAll() Get all forms from an account
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_forms
 *
 * @method self<null> getAll() Get all forms from an account
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_forms
 *
 * @method static self<null> delete(int|string $form_guid) Delete an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/delete_form
 *
 * @method self<null> delete(int|string $form_guid) Delete an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/delete_form
 *
 */
class FormHubspot extends Hubspot
{
    protected string $resource = "forms-v2";

    protected int $version = 2;
}