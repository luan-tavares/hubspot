<?php

use LTL\HubspotApi\Resources\CompanyHubspot;
use LTL\HubspotApi\Resources\EngagementV1Hubspot;

require_once __DIR__ .'/__init.php';

dd(
    CompanyHubspot::list()
);
