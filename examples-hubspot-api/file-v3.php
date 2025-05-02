<?php

require_once __DIR__ . '/__init.php';

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Resources\V3\FileHubspot;

$path = '/home/luan/Downloads/Aula-de-JavaScript-Funcional-e-Frontend.pptx';

$upload_file = new CURLFile($path, 'application/octet-stream');

$file_options = [
    'access' => 'PUBLIC_NOT_INDEXABLE',
    'ttl' => 'P3M',
    'overwrite' => true,
    'duplicateValidationStrategy' => 'NONE',
    'duplicateValidationScope' => 'ENTIRE_PORTAL'
];

$post_data = [
    'file' => $upload_file,
    'fileName' => 'luan.csv',
    'options' => json_encode($file_options),
    'folderPath' => '/__luan'
];


$request = FileHubspot::withProgressBar()->withHeaders()->upload($post_data);
dd($request);

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


dump($request->url);
$file = FileHubspot::withProgressBar()->importFromUrl($params);
$taskId = $file->id;

dump(FileHubspot::checkImport($taskId));

FileHubspot::getAllFolders()->each(function ($folder) {
    dump($folder->path);
});
