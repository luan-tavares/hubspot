<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\ContactHubspot;

$hubspot = ContactHubspot::limit(10)->getByEmail('luan@tropicalhub.co');

dd($hubspot['properties']);


$hubspotCreate = ContactHubspot::create(['properties' => ['firstname' => 1]]);
$id = $hubspotCreate->id;
$hubspotDelete = ContactHubspot::delete($id);
