<?php



require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Concerns\WithObjectResponse;
use LTL\Hubspot\Concerns\WithRequestException;
use LTL\Hubspot\Objects\CrmObject;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V3\Interfaces\CrmHubspotInterface;

$after = $i = $memory = 0;

class B extends CompanyHubspot implements WithObjectResponse
{

}
$a = new class extends CompanyHubspot implements WithRequestException, WithObjectResponse, CrmHubspotInterface {

};

$k = $a->getAll();

foreach ($k as $z) {
    dd($z);
}

$a->importAll(function ($companies) {
    foreach ($companies as $key => $value) {
        dump($value);
    }
});
dd('');

/** @var CompanyHubspot<null>&CrmObject */
$get = $a->get(19740053003);

dd($get->id);
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
