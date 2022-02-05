<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\ContactHubspot;

$hubspotCreate = ContactHubspot::create(['properties' => ['firstname' => 1]]);

$id = $hubspotCreate->id;
$hubspotDelete = ContactHubspot::delete($id);

$contactsBuilder = ContactHubspot::limit(100);

$after = $i = $memory = 0;
$after = 5671124372;
$after = 0;
while (true) {
    $contacts = ContactHubspot::limit(100)->after($after)->getAll();

    foreach ($contacts as $company) {
        dump((++$i) .' - '. $company->properties->email);
    }
    $after = $contacts->after;

    dump(memory_get_peak_usage(), memory_get_peak_usage() - $memory, $after);
    $memory = memory_get_peak_usage();

    if (!$after) {
        break;
    }
}
