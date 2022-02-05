<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contacts
 *
 * @method $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contacts
 *
 * @method static $this get(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact
 *
 * @method $this get(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact
 *
 * @method static $this getByEmail(int|string $email) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact_by_email
 *
 * @method $this getByEmail(int|string $email) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact_by_email
 *
 * @method static $this getRecentlyUpdated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_updated_contacts
 *
 * @method $this getRecentlyUpdated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_updated_contacts
 *
 * @method static $this getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_created_contacts
 *
 * @method $this getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_created_contacts
 *
 * @method static $this getBatch() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_vid
 *
 * @method $this getBatch() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_vid
 *
 * @method static $this getBatchByEmail() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_email
 *
 * @method $this getBatchByEmail() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_email
 *
 * @method static $this create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_contact
 *
 * @method $this create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_contact
 *
 * @method static $this updateById(int|string $vid, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact
 *
 * @method $this updateById(int|string $vid, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact
 *
 * @method static $this updateByEmail(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact-by-email
 *
 * @method $this updateByEmail(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact-by-email
 *
 * @method static $this createOrUpdate(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_or_update
 *
 * @method $this createOrUpdate(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_or_update
 *
 * @method static $this batchCreateOrUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/batch_create_or_update
 *
 * @method $this batchCreateOrUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/batch_create_or_update
 *
 * @method static $this delete(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/delete_contact
 *
 * @method $this delete(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/delete_contact
 *
 * @method static $this merge(int|string $vId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/merge-contacts
 *
 * @method $this merge(int|string $vId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/merge-contacts
 *
 */
class ContactV1Hubspot extends Hubspot
{
    protected string $resource = "contacts-v1";
}
