<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CompanyHubspot;
use LTL\Hubspot\Resources\ContactHubspot;

$memory = $after = 0;
$engagementBuilder = CompanyHubspot::limit(100);
$count = 0;
while (true) {
    $engagements = $engagementBuilder->after($after)->getAll();
    $after = $engagements->after;
    dump('Add: '. memory_get_peak_usage() - $memory);
    dump($after, $count += count($engagements), '-----');
   

    if (!$after) {
        break;
    }
    $memory = memory_get_peak_usage();
}
