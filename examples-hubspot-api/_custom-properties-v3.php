<?php



require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Concerns\WithObjectResponse;
use LTL\Hubspot\Properties\CompanyExampleProperties;
use LTL\Hubspot\Resources\V3\CompanyHubspot;

class P
{
    public readonly string $name;
}

$c = new class extends CompanyHubspot implements WithObjectResponse {
    public readonly CompanyExampleProperties $properties;
};

$companies = $c->getAll();

foreach ($companies as $company) {
    dd($company->properties);
}
