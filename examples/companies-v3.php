<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CompanyHubspot;

$hubspotCreate = CompanyHubspot::create(['properties' => ['name' => 1]]);
$id = $hubspotCreate->id;
$hubspotDelete = CompanyHubspot::delete($id);

$after = $i = $memory = 0;
while (true) {
    $companies = CompanyHubspot::limit(100)->after($after)->getAll();
    
    dump($companies->map(function ($company) use (&$i) {
        $i++;

        return $i .' - '. $company->properties->name;
    }));
   
    $after = $companies->after;

    dump(memory_get_peak_usage(), memory_get_peak_usage() - $memory, $after);
    $memory = memory_get_peak_usage();

    if (!$after) {
        break;
    }
}
