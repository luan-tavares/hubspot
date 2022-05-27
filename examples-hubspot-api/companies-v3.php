<?php



require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\V3\CompanyHubspot;

$after = $i = $memory = 0;

// try {
//     CompanyHubspot::after(10)->toArray();
// } catch (HubspotApiException $exception) {
//     dump($exception->getMessage());
// }

// try {
//     (new CompanyHubspot)->toArray();
// } catch (HubspotApiException $exception) {
//     dump($exception->getMessage());
// }

// dd('');
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
