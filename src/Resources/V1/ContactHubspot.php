<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @method static self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contacts
 *
 * @method self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contacts
 *
 * @method static self<object, null> get(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact
 *
 * @method self<object, null> get(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact
 *
 * @method static self<object, null> getByEmail(int|string $email) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact_by_email
 *
 * @method self<object, null> getByEmail(int|string $email) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_contact_by_email
 *
 * @method static self<object, null> getRecentlyUpdated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_updated_contacts
 *
 * @method self<object, null> getRecentlyUpdated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_updated_contacts
 *
 * @method static self<object, null> getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_created_contacts
 *
 * @method self<object, null> getRecentlyCreated() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_recently_created_contacts
 *
 * @method static self<object, null> getBatch() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_vid
 *
 * @method self<object, null> getBatch() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_vid
 *
 * @method static self<object, null> getBatchByEmail() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_email
 *
 * @method self<object, null> getBatchByEmail() 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/get_batch_by_email
 *
 * @method static self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_contact
 *
 * @method self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_contact
 *
 * @method static self<object, null> updateById(int|string $vid, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact
 *
 * @method self<object, null> updateById(int|string $vid, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact
 *
 * @method static self<object, null> updateByEmail(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact-by-email
 *
 * @method self<object, null> updateByEmail(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/update_contact-by-email
 *
 * @method static self<object, null> createOrUpdate(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_or_update
 *
 * @method self<object, null> createOrUpdate(int|string $email, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/create_or_update
 *
 * @method static self<object, null> batchCreateOrUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/batch_create_or_update
 *
 * @method self<object, null> batchCreateOrUpdate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/batch_create_or_update
 *
 * @method static self<object, null> delete(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/delete_contact
 *
 * @method self<object, null> delete(int|string $vid) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/delete_contact
 *
 * @method static self<object, null> merge(int|string $vId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/merge-contacts
 *
 * @method self<object, null> merge(int|string $vId, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/merge-contacts
 *
 */
class ContactHubspot extends Hubspot
{
    protected string $resource = "contacts-v1";

    protected int $version = 1;
}