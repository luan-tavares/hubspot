<?php



require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Concerns\WithMaxLimit;
use LTL\Hubspot\Concerns\WithObjectResponse;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V3\Interfaces\CrmHubspotInterface;

$after = $i = $memory = 0;

class B extends CompanyHubspot implements WithObjectResponse
{

}
$a = new class extends CompanyHubspot implements WithMaxLimit, WithObjectResponse, CrmHubspotInterface {

};

$getAll = $a->getAll();

$get = $a->get(100);

$ddd = $get['s'];

foreach ($getAll as $key => $value) {
    dd($value);
}

CompanyHubspot::importAll(function ($fn) {
    
    foreach ($fn as $value) {
        dump($value->id);
    }
});
