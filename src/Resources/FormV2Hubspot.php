<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this submit(int|string $portalId, int|string $formGuid, array $requestBody) Submit data to a form
* @method $this submit(int|string $portalId, int|string $formGuid, array $requestBody) Submit data to a form
* @method static $this getSubmissions(int|string $formGuid) Get submissions for a form
* @method $this getSubmissions(int|string $formGuid) Get submissions for a form
* @method static $this getFileUploaded(int|string $fileId) Get a file uploaded via form
* @method $this getFileUploaded(int|string $fileId) Get a file uploaded via form
* @method static $this create(array $requestBody) Create a new form
* @method $this create(array $requestBody) Create a new form
* @method static $this update(int|string $form_guid, array $requestBody) Update an existing form
* @method $this update(int|string $form_guid, array $requestBody) Update an existing form
* @method static $this get(int|string $form_guid) Get a form by its unique ID
* @method $this get(int|string $form_guid) Get a form by its unique ID
* @method static $this getFields(int|string $form_guid) Get all fields from a form
* @method $this getFields(int|string $form_guid) Get all fields from a form
* @method static $this getField(int|string $form_guid, int|string $field_name) Get a single field from a form
* @method $this getField(int|string $form_guid, int|string $field_name) Get a single field from a form
* @method static $this getAll() Get all forms from an account
* @method $this getAll() Get all forms from an account
* @method static $this delete(int|string $form_guid) Delete an existing form
* @method $this delete(int|string $form_guid) Delete an existing form
 */
class FormV2Hubspot extends Hubspot
{
    protected string $resource = "forms-v2";
}
