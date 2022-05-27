<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V3\EngagementCallHubspot;

$dealId = 8635866769;

define('CALL_TO_DEAL_DEFINITION_ID', 206);

EngagementCallHubspot::createAssociation(
    16693407066,
    'deals',
    $dealId,
    CALL_TO_DEAL_DEFINITION_ID
);

dd(
    EngagementCallHubspot::limit(2)->associations('deals')->get(16693407066),
);
