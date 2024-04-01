<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contacts
 *
 * @method self<null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contacts
 *
 * @method static self<null> get(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact
 *
 * @method self<null> get(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact
 *
 * @method static self<null> getByEmail(int|string $email) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact_by_email
 *
 * @method self<null> getByEmail(int|string $email) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact_by_email
 *
 * @method static self<null> getRecentlyUpdated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_updated_contacts
 *
 * @method self<null> getRecentlyUpdated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_updated_contacts
 *
 * @method static self<null> getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_created_contacts
 *
 * @method self<null> getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_created_contacts
 *
 * @method static self<null> getBatch() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_vid
 *
 * @method self<null> getBatch() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_vid
 *
 * @method static self<null> getBatchByEmail() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_email
 *
 * @method self<null> getBatchByEmail() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_email
 *
 * @method static self<null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_contact
 *
 * @method self<null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_contact
 *
 * @method static self<null> updateById(int|string $vid, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact
 *
 * @method self<null> updateById(int|string $vid, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact
 *
 * @method static self<null> updateByEmail(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact-by-email
 *
 * @method self<null> updateByEmail(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact-by-email
 *
 * @method static self<null> createOrUpdate(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_or_update
 *
 * @method self<null> createOrUpdate(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_or_update
 *
 * @method static self<null> batchCreateOrUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/batch_create_or_update
 *
 * @method self<null> batchCreateOrUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/batch_create_or_update
 *
 * @method static self<null> delete(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/delete_contact
 *
 * @method self<null> delete(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/delete_contact
 *
 * @method static self<null> merge(int|string $vId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/merge-contacts
 *
 * @method self<null> merge(int|string $vId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/merge-contacts
 *
 */
class ContactHubspot extends Hubspot
{
    protected string $resource = "contacts-v1";

    protected int $version = 1;
}