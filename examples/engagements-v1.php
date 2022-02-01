<?php

use LTL\Hubspot\Resources\CompanyHubspot;
use LTL\Hubspot\Resources\EngagementV1Hubspot;

require_once __DIR__ .'/__init.php';



$memory = 0;

while (true) {
    $engagements = EngagementV1Hubspot::get(151);
    dump('-----', $engagements);
    dump(memory_get_peak_usage() - $memory);
    $memory = memory_get_peak_usage();
}
