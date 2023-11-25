<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Factories\BuilderFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;

$builder = BuilderFactory::build(new ContactHubspot);
dump('change');
$builder = ContactHubspot::limit(10);
dump('change');
$builder = ContactHubspot::limit(10);
dump('change');
$builder = ContactHubspot::limit(10);
dump('change');
$builder = ContactHubspot::limit(10);
