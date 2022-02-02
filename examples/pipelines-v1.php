<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CrmPipelineV1Hubspot;

dd(
    CrmPipelineV1Hubspot::limit(10)->getAll('deals')->toArray()
);
