<?php

require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\FileHubspot;

$path = '/home/luan/Desktop/hub.py';

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
    'fileName' => 'aaa.py',
    'options' => json_encode($file_options),
    'folderPath' => '/__luan'
];




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

dump(FileHubspot::withProgressBar()->withResponseHeaders()->upload($post_data));
$file = FileHubspot::withProgressBar()->importFromUrl($params);
$taskId = $file->id;

dump(FileHubspot::checkImport($taskId));

FileHubspot::getAllFolders()->each(function ($folder) {
    dump($folder->path);
});
