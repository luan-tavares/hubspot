<?php

namespace LTL\Hubspot\Core\Handlers;

use LTL\Hubspot\Core\Handlers\AssociationImportAll\AssociationImportAllHandler;
use LTL\Hubspot\Core\Handlers\ContactCreateOrUpdateByEmail\ContactCreateOrUpdateByEmailHandler;
use LTL\Hubspot\Core\Handlers\CrmCreateOrUpdate\CrmCreateOrUpdateHandler;
use LTL\Hubspot\Core\Handlers\ImportAll\ImportAllHandler;

abstract class HandlersProvider
{
    public const HANDLERS = [
        'create_or_update' => CrmCreateOrUpdateHandler::class,
        'import_all' => ImportAllHandler::class,
        'contact_create_or_update_by_email' => ContactCreateOrUpdateByEmailHandler::class,
        'associations_import_all' => AssociationImportAllHandler::class
    ];
}
