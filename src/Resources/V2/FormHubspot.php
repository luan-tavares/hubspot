<?php

namespace LTL\Hubspot\Resources\V2;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @method static self<object, null> submit(int|string $portalId, int|string $formGuid, array $requestBody) Submit data to a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/submit_form
 *
 * @method self<object, null> submit(int|string $portalId, int|string $formGuid, array $requestBody) Submit data to a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/submit_form
 *
 * @method static self<object, null> getSubmissions(int|string $formGuid) Get submissions for a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/get-submissions-for-a-form
 *
 * @method self<object, null> getSubmissions(int|string $formGuid) Get submissions for a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/get-submissions-for-a-form
 *
 * @method static self<object, null> getFileUploaded(int|string $fileId) Get a file uploaded via form
 * See https://legacydocs.hubspot.com/docs/methods/form-integrations/v1/uploaded-files/signed-url-redirect
 *
 * @method self<object, null> getFileUploaded(int|string $fileId) Get a file uploaded via form
 * See https://legacydocs.hubspot.com/docs/methods/form-integrations/v1/uploaded-files/signed-url-redirect
 *
 * @method static self<object, null> create(array $requestBody) Create a new form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/create_form
 *
 * @method self<object, null> create(array $requestBody) Create a new form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/create_form
 *
 * @method static self<object, null> update(int|string $form_guid, array $requestBody) Update an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/update_form
 *
 * @method self<object, null> update(int|string $form_guid, array $requestBody) Update an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/update_form
 *
 * @method static self<object, null> get(int|string $form_guid) Get a form by its unique ID
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_form
 *
 * @method self<object, null> get(int|string $form_guid) Get a form by its unique ID
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_form
 *
 * @method static self<object, null> getFields(int|string $form_guid) Get all fields from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_fields
 *
 * @method self<object, null> getFields(int|string $form_guid) Get all fields from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_fields
 *
 * @method static self<object, null> getField(int|string $form_guid, int|string $field_name) Get a single field from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_field
 *
 * @method self<object, null> getField(int|string $form_guid, int|string $field_name) Get a single field from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_field
 *
 * @method static self<object, null> getAll() Get all forms from an account
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_forms
 *
 * @method self<object, null> getAll() Get all forms from an account
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_forms
 *
 * @method static self<object, null> delete(int|string $form_guid) Delete an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/delete_form
 *
 * @method self<object, null> delete(int|string $form_guid) Delete an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/delete_form
 *
 */
class FormHubspot extends Hubspot
{
    protected string $resource = "forms-v2";

    protected int $version = 2;
}