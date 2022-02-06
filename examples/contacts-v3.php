<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\ContactHubspot;

$hubspot = ContactHubspot::limit(10)->get(30501);

dump($hubspot->map(function ($item) {
    return $item->properties->lastname;
}));

dump($hubspot->mapWithKeys(function ($item) {
    return [$item->id => $item->properties->firstname .' '. $item->properties->lastname];
}));

dd($hubspot->filter(function ($item) {
    return $item->properties->lastname === 'Mattos';
}));



$hubspotCreate = ContactHubspot::create(['properties' => ['firstname' => 1]]);
$id = $hubspotCreate->id;
$hubspotDelete = ContactHubspot::delete($id);
