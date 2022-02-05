<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\HubDbHubspot;

//$hubDb = HubDbHubspot::exportDraft(5314890)->toJson();

$file = new CURLFile(__ROOT__ .'/luan.csv', 'application/octet-stream');

$settings =  [
    'skipRows' => 1,
    'format' => 'csv',
    'separator' => ',',
    'encoding' => 'utf-8',
    'columnMappings' => [
        [ 'target' => 1, 'source' => 1 ],
        [ 'target' => 2, 'source' => 2 ],
        [ 'target' => 3, 'source' => 3 ],
    ],
    'idSourceColumn' => 1,
    //'primaryKeyColumn' => 'name',
    'resetTable' => true
];

$request = [
    'file' => $file,
    'config' => json_encode($settings, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
];

dd(HubDbHubspot::progressBar()->importToDraft(5334546, $request));
//dd(HubDbHubspot::includeForeignIds()->get(5334546));

//file_put_contents(__ROOT__ .'/luan.csv', $hubDb);
