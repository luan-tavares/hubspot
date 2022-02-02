<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CrmObjectHubspot;
use LTL\Hubspot\Resources\PipelineHubspot;

dd(
    CrmObjectHubspot::getAll('deals')
);
