<?php

use LTL\HubspotApi\Resources\EngagementV1Hubspot;

require_once __DIR__ .'/__init.php';

dd(
    EngagementV1Hubspot::getCallDispositions(),
    EngagementV1Hubspot::setCount(1)->getRecents()
);
