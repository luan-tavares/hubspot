<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CompanyHubspot;

$memory = $after = 0;
$companyBuilder = CompanyHubspot::limit(3);

$hubspotCreate = CompanyHubspot::create(['properties' => ['name' => 1]]);
$id = $hubspotCreate->id;
$hubspotDelete = CompanyHubspot::delete($id);
$companies = CompanyHubspot::limit(10)->getAll();

$companies = CompanyHubspot::limit(100)->get(97250764);


foreach ($companies as $company) {
    dump($company);
}
dd('a');



while (true) {
    //$companies =  CompanyHubspot::limit(2)->after($after)->getAll(); // with memory leak
    $companies = $companyBuilder->after($after)->getAll(); //without memory leak

    $after = $companies->after;
    //$index = $companies->index;
    
    // dump(CompanyHubspot::limit(2));
    dump('---------', $companies, memory_get_peak_usage() - $memory);


    $memory = memory_get_peak_usage();
}
