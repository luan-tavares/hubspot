<?php



require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Concerns\WithMaxLimit;
use LTL\Hubspot\Concerns\WithObjectResponse;
use LTL\Hubspot\Concerns\WithRequestException;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V3\Interfaces\CrmHubspotInterface;

$after = $i = $memory = 0;

class B extends CompanyHubspot implements WithObjectResponse
{

}
$a = new class extends CompanyHubspot implements WithMaxLimit, WithRequestException, WithObjectResponse, CrmHubspotInterface {

};

$getAll = CompanyHubspot::getAll();

$get = $a->get(19740053003);
$ddd = $get->id;

foreach ($getAll as $key => $value) {
    # code...
}

dump($ddd);

$a->importAll(function (CompanyHubspot $c) {
    foreach ($c as $value) {
        dump($value->id);
    }
});
