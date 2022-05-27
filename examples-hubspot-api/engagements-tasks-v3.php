<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V3\EngagementTaskHubspot;

$dealId = 8635866769;

define('TASK_TO_DEAL_DEFINITION_ID', 216);


dd(
    EngagementTaskHubspot::limit(2)->associations('deals')->getAll()->toArray(),
);
