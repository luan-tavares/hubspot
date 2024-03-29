<?php



require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\V3\CompanyHubspot;

$after = $i = $memory = 0;

/** */
while (true) {
    CompanyHubspot::limit(10);
    $companies = CompanyHubspot::after($after)
        ->withRequestException()
        ->withRequestTries(5)
        ->limit(100)
        ->getAll();

    dd($companies->empty());
    
    dump($companies->map(function ($company) use (&$i) {
        $i++;

        return "{$i} - {$company->id} - {$company->properties->name}";
    }));
   
    $after = $companies->after;

    dump(memory_get_peak_usage(), memory_get_peak_usage() - $memory, $after);
    $memory = memory_get_peak_usage();

    if (!$after) {
        break;
    }
}
