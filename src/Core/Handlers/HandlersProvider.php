<?php

namespace LTL\Hubspot\Core\Handlers;

use LTL\Hubspot\Core\Handlers\CrmCreateOrUpdate\CrmCreateOrUpdateHandler;
use LTL\Hubspot\Core\Handlers\ImportAll\ImportAllHandler;

abstract class HandlersProvider
{
    public const HANDLERS = [
        'create_or_update' => CrmCreateOrUpdateHandler::class,
        'import_all' => ImportAllHandler::class
    ];
}