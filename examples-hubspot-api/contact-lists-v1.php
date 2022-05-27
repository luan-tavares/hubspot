<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V1\ContactListHubspot;

dump(
    ContactListHubspot::withListIds(1, 2)->batchRead()
);
