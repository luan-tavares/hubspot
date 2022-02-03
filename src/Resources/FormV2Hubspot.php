<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this submit(int|string $portalId, int|string $formGuid, array $requestBody) Submit data to a form
 * See 
 *
 * @method $this submit(int|string $portalId, int|string $formGuid, array $requestBody) Submit data to a form
 * See 
 *
 * @method static $this getSubmissions(int|string $formGuid) Get submissions for a form
 * See 
 *
 * @method $this getSubmissions(int|string $formGuid) Get submissions for a form
 * See 
 *
 * @method static $this getFileUploaded(int|string $fileId) Get a file uploaded via form
 * See 
 *
 * @method $this getFileUploaded(int|string $fileId) Get a file uploaded via form
 * See 
 *
 * @method static $this create(array $requestBody) Create a new form
 * See 
 *
 * @method $this create(array $requestBody) Create a new form
 * See 
 *
 * @method static $this update(int|string $form_guid, array $requestBody) Update an existing form
 * See 
 *
 * @method $this update(int|string $form_guid, array $requestBody) Update an existing form
 * See 
 *
 * @method static $this get(int|string $form_guid) Get a form by its unique ID
 * See 
 *
 * @method $this get(int|string $form_guid) Get a form by its unique ID
 * See 
 *
 * @method static $this getFields(int|string $form_guid) Get all fields from a form
 * See 
 *
 * @method $this getFields(int|string $form_guid) Get all fields from a form
 * See 
 *
 * @method static $this getField(int|string $form_guid, int|string $field_name) Get a single field from a form
 * See 
 *
 * @method $this getField(int|string $form_guid, int|string $field_name) Get a single field from a form
 * See 
 *
 * @method static $this getAll() Get all forms from an account
 * See 
 *
 * @method $this getAll() Get all forms from an account
 * See 
 *
 * @method static $this delete(int|string $form_guid) Delete an existing form
 * See 
 *
 * @method $this delete(int|string $form_guid) Delete an existing form
 * See 
 *
 */
class FormV2Hubspot extends Hubspot
{
    protected string $resource = "forms-v2";
}
