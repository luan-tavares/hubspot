<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CompanyHubspot;
use LTL\Hubspot\Resources\ContactHubspot;

$contactBuilder = ContactHubspot::limit(10);
ContactHubspot::limit(40);
dd($contactBuilder->getAll(), '----', ContactHubspot::offset(20));

$after = 0;
while (true) {
    $contacts = ContactHubspot::getByEmail('luan.tavares.lourenco@gmail.com');
    $contacts = CompanyHubspot::limit(100)->after($after)->all();
    // dd($contacts);
    foreach ($contacts as $contact) {
        dump($contact->properties->name, $contacts->after);
    }
    $after = $contacts->after;

    if (!$after) {
        break;
    }
}
