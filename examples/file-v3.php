<?php

require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\FileHubspot;

$upload_file = new CURLFile(__DIR__ .'/teste.xlsx', 'application/octet-stream');

$file_options = [
    'access' => 'PUBLIC_NOT_INDEXABLE',
    'ttl' => 'P3M',
    'overwrite' => true,
    'duplicateValidationStrategy' => 'NONE',
    'duplicateValidationScope' => 'ENTIRE_PORTAL'
];

$post_data = [
    'file' => $upload_file,
    'fileName' => 'aaa.xlsx',
    'options' => json_encode($file_options),
    'folderPath' => '/__luan'
];

$file = FileHubspot::upload($post_data);


$params = [
    'access' => 'PRIVATE',
    'ttl' => 'P3M',
    'name' => 'luan.js',
    'url' => 'https://code.jquery.com/jquery-3.6.0.js',
    'duplicateValidationStrategy' => 'NONE',
    'duplicateValidationScope' => 'ENTIRE_PORTAL',
    'overwrite' => true,
    'folderPath' => '/__luan'
];


//$file = FileHubspot::progressBar()->importFromUrl($params);

dump(FileHubspot::getAllFolders()->toArray());
