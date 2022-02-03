<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CompanyHubspot;

$memory = $after = 0;
$companyBuilder = CompanyHubspot::limit(100);
$count = 0;
while (true) {
    $companies = $companyBuilder->after($after)->getAll();
    $after = $companies->after;
    //dump('Add: '. memory_get_peak_usage() - $memory);
    
    foreach ($companies as $company) {
        $a = ['properties' => [
            'a',
            'b',
            $company
        ]];
        dd($a);
    }
   

    if (!$after) {
        break;
    }
    $memory = memory_get_peak_usage();
}
