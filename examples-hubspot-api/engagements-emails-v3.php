<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V3\EngagementEmailHubspot;

$dealId = 8635866769;

define('EMAIL_TO_DEAL_DEFINITION_ID', 210);


dd(
    EngagementEmailHubspot::limit(2)
        ->properties('hs_timestamp')
        ->associations('deals')
        ->get(35042492)
        ->toArray()
);


EngagementEmailHubspot::createAssociation(
    35042492,
    'deals',
    $dealId,
    EMAIL_TO_DEAL_DEFINITION_ID
);
