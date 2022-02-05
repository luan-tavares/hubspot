<?php



require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\EngagementV1Hubspot;

$memory = $after = 0;
$engagementBuilder = EngagementV1Hubspot::limit(1);
$count = 0;
while (true) {
    $engagements = $engagementBuilder->offset($after)->getAll();
    $after = $engagements->after;
    dump('Add: '. memory_get_peak_usage() - $memory);
    dump($after, '-----');
   

    if (!$after) {
        break;
    }
    $memory = memory_get_peak_usage();
}
