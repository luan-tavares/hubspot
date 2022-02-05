<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\ContactHubspot;

$hubspot = ContactHubspot::limit(10)->getAll();

dump($hubspot->map(function ($item) {
    return $item->properties->lastname;
}));

dd($hubspot->filter(function ($item) {
    return $item->properties->lastname === 'Mattos';
}));



$hubspotCreate = ContactHubspot::create(['properties' => ['firstname' => 1]]);
$id = $hubspotCreate->id;
$hubspotDelete = ContactHubspot::delete($id);
