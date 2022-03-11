<?php

namespace LTL\Hubspot\Resources\V2;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this submit(int|string $portalId, int|string $formGuid, array $requestBody) Submit data to a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/submit_form
 *
 * @method $this submit(int|string $portalId, int|string $formGuid, array $requestBody) Submit data to a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/submit_form
 *
 * @method static $this getSubmissions(int|string $formGuid) Get submissions for a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/get-submissions-for-a-form
 *
 * @method $this getSubmissions(int|string $formGuid) Get submissions for a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/get-submissions-for-a-form
 *
 * @method static $this getFileUploaded(int|string $fileId) Get a file uploaded via form
 * See https://legacydocs.hubspot.com/docs/methods/form-integrations/v1/uploaded-files/signed-url-redirect
 *
 * @method $this getFileUploaded(int|string $fileId) Get a file uploaded via form
 * See https://legacydocs.hubspot.com/docs/methods/form-integrations/v1/uploaded-files/signed-url-redirect
 *
 * @method static $this create(array $requestBody) Create a new form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/create_form
 *
 * @method $this create(array $requestBody) Create a new form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/create_form
 *
 * @method static $this update(int|string $form_guid, array $requestBody) Update an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/update_form
 *
 * @method $this update(int|string $form_guid, array $requestBody) Update an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/update_form
 *
 * @method static $this get(int|string $form_guid) Get a form by its unique ID
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_form
 *
 * @method $this get(int|string $form_guid) Get a form by its unique ID
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_form
 *
 * @method static $this getFields(int|string $form_guid) Get all fields from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_fields
 *
 * @method $this getFields(int|string $form_guid) Get all fields from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_fields
 *
 * @method static $this getField(int|string $form_guid, int|string $field_name) Get a single field from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_field
 *
 * @method $this getField(int|string $form_guid, int|string $field_name) Get a single field from a form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_field
 *
 * @method static $this getAll() Get all forms from an account
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_forms
 *
 * @method $this getAll() Get all forms from an account
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/get_forms
 *
 * @method static $this delete(int|string $form_guid) Delete an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/delete_form
 *
 * @method $this delete(int|string $form_guid) Delete an existing form
 * See https://legacydocs.hubspot.com/docs/methods/forms/v2/delete_form
 *
 */
class FormHubspot extends Hubspot
{
    protected string $resource = "forms-v2";

    protected int $version = 2;
}
