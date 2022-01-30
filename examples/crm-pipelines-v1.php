<?php


require_once __DIR__ .'/__init.php';

use LTL\HubspotApi\Resources\CrmPipelineV1Hubspot;

dd(
    CrmPipelineV1Hubspot::get('deals', 'default')->toArray()
);
