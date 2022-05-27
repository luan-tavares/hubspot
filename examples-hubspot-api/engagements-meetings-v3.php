<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V3\EngagementMeetingHubspot;

$dealId = 8635866769;

define('MEETING_TO_DEAL_DEFINITION_ID', 212);


dd(
    EngagementMeetingHubspot::limit(2)->associations('deals')->getAll()->toArray(),
);
