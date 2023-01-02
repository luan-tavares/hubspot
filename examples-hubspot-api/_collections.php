<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CompanyHubspot;

$hubspot = CompanyHubspot::limit(2)->getAll();

dd(
    collect($hubspot),
    iterator_to_array($hubspot),
    $hubspot->toJson()
);