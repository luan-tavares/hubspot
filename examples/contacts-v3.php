<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\ContactHubspot;

$hubspotCreate = ContactHubspot::create(['properties' => ['firstname' => 1]]);

if ($hubspotCreate->error()) {
    dd($hubspotCreate->toArray());
}
$id = $hubspotCreate->id;
$hubspotDelete = ContactHubspot::delete($id);

$hubspot = ContactHubspot::limit(10)->getAll();

dump($hubspot->map(function ($item) {
    return $item->properties->lastname;
}));

dump($hubspot->mapWithKeys(function ($item) {
    return [$item->id => $item->properties->firstname .' '. $item->properties->lastname];
}));

dd($hubspot->filter(function ($item) {
    return $item->properties->lastname === 'Mattos';
}));
