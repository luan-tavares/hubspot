<?php



require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V3\CompanyHubspot;

$after = $i = $memory = 0;

//dd(CompanyHubspot::get(140053003));

dd(CompanyHubspot::propertiesWithHistory('name')->associations('contact')->get(19740053003));

/** */
while (true) {
    $companies = CompanyHubspot::limit(2);
    $companies = $companies->after($after)->getAll();

    foreach ($companies as $company) {
        dd($company);
    }

    dd($companies->createdAt);
    
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
