<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V3\ConversationHubspot;
use LTL\Hubspot\Resources\V3\EngagementCommunicationHubspot;

dd(
    EngagementCommunicationHubspot::associations('deals,contacts,companies,conversations')->get(29115267450)->toArray(),
    ConversationHubspot::getAllMessages(3692548117)->toArray()
);