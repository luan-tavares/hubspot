<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CrmSchemaHubspot;

$schemas =  CrmSchemaHubspot::getAll();

dd(
    $schemas,
    CrmSchemaHubspot::get('deals')
);
