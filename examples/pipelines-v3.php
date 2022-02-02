<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\PipelineHubspot;

dd(
    PipelineHubspot::getStage('deals', 'default', 783693)->toArray()
);
