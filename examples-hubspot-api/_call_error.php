<?php

require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V3\CompanyHubspot;

class A
{
    private function __construct()
    {
        
    }
}

$a = new CompanyHubspot;



$a->importAll(function ($company) {
    new A;
});
