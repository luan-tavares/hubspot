<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CompanyHubspot;

(new CompanyHubspot)->toArray(10);

// $hubspotCreate = CompanyHubspot::create(['properties' => ['name' => 1]]);
// $id = $hubspotCreate->id;
// $hubspotDelete = CompanyHubspot::delete($id);
$a = 0;
while ($a < 10) {
    $a++;
    CompanyHubspot::limit(10)->getAll();
}



dd('a');


$after = $i = $memory = 0;
while (true) {
    $companies = CompanyHubspot::after($after)->limit(100)->getAll();
    
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
