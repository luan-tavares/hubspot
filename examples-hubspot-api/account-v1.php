<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V1\AccountHubspot;

dump(
    AccountHubspot::getRateLimit()->toArray(),
    AccountHubspot::getDetails()->toArray()
);
