<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\ContactHubspot;

dd(ContactHubspot::getBymail('luan@tropicalhub.co'));
$contacts = ContactHubspot::all();

foreach ($contacts as $contact) {
    dd($contact);
}
    ContactHubspot::byEmail()->get('luan.tavares.lourenco@gmail.com');
