<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this upload(array $requestBody) 
* @method $this upload(array $requestBody) 
* @method static $this replace(int|string $file_id, array $requestBody) 
* @method $this replace(int|string $file_id, array $requestBody) 
* @method static $this getAll() 
* @method $this getAll() 
* @method static $this get(int|string $file_id) 
* @method $this get(int|string $file_id) 
* @method static $this changeAccess(array $requestBody) 
* @method $this changeAccess(array $requestBody) 
* @method static $this delete(int|string $file_id, array $requestBody) 
* @method $this delete(int|string $file_id, array $requestBody) 
* @method static $this getPublicUrl(int|string $fileId) 
* @method $this getPublicUrl(int|string $fileId) 
* @method static $this move(int|string $file_id, array $requestBody) 
* @method $this move(int|string $file_id, array $requestBody) 
* @method static $this getAllFolders() 
* @method $this getAllFolders() 
* @method static $this getFolder(int|string $folder_id) 
* @method $this getFolder(int|string $folder_id) 
* @method static $this createFolder(array $requestBody) 
* @method $this createFolder(array $requestBody) 
* @method static $this moveFolder(int|string $folder_id, array $requestBody) 
* @method $this moveFolder(int|string $folder_id, array $requestBody) 
* @method static $this deleteFolder(int|string $folder_id) 
* @method $this deleteFolder(int|string $folder_id) 
 */
class FileV2Hubspot extends Hubspot
{
    protected string $resource = "files-v2";
}
