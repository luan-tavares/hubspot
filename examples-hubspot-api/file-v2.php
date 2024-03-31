<?php

require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V2\FileHubspot;

$upload_file = new CURLFile(__DIR__ .'/teste.xlsx', 'application/octet-stream');

$file_options = [
    'access' => 'PUBLIC_INDEXABLE',
    'ttl' => 'P3M',
    'overwrite' => false,
    'duplicateValidationStrategy' => 'NONE',
    'duplicateValidationScope' => 'ENTIRE_PORTAL'
];

$post_data = [
    'file' => $upload_file,
    'options' => json_encode($file_options),
    'folderPath' => '/__luan'
];

$files = FileHubspot::withProgressBar()->upload($post_data);

foreach ($files as $file) {
    dump($file);
}
