<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Containers\BuilderContainer;
use LTL\Hubspot\Resources\CompanyHubspot;

$after = $i = $memory = 0;

while ($i < 100) {
    $i++;
    $companies = CompanyHubspot::after($after)->limit(100)->getAll();
    dump(number_format(memory_get_peak_usage()/1024/1024, 3) .'MB', (memory_get_peak_usage() - $memory));
    $memory = memory_get_peak_usage();
    dump(BuilderContainer::count());

    if ($i == 10) {
        BuilderContainer::destroyAll();
    }
}
