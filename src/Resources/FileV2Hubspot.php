<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this upload(array $requestBody) 
 * See 
 *
 * @method $this upload(array $requestBody) 
 * See 
 *
 * @method static $this replace(int|string $file_id, array $requestBody) 
 * See 
 *
 * @method $this replace(int|string $file_id, array $requestBody) 
 * See 
 *
 * @method static $this getAll() 
 * See 
 *
 * @method $this getAll() 
 * See 
 *
 * @method static $this get(int|string $file_id) 
 * See 
 *
 * @method $this get(int|string $file_id) 
 * See 
 *
 * @method static $this changeAccess(array $requestBody) 
 * See 
 *
 * @method $this changeAccess(array $requestBody) 
 * See 
 *
 * @method static $this delete(int|string $file_id, array $requestBody) 
 * See 
 *
 * @method $this delete(int|string $file_id, array $requestBody) 
 * See 
 *
 * @method static $this getPublicUrl(int|string $fileId) 
 * See 
 *
 * @method $this getPublicUrl(int|string $fileId) 
 * See 
 *
 * @method static $this move(int|string $file_id, array $requestBody) 
 * See 
 *
 * @method $this move(int|string $file_id, array $requestBody) 
 * See 
 *
 * @method static $this getAllFolders() 
 * See 
 *
 * @method $this getAllFolders() 
 * See 
 *
 * @method static $this getFolder(int|string $folder_id) 
 * See 
 *
 * @method $this getFolder(int|string $folder_id) 
 * See 
 *
 * @method static $this createFolder(array $requestBody) 
 * See 
 *
 * @method $this createFolder(array $requestBody) 
 * See 
 *
 * @method static $this moveFolder(int|string $folder_id, array $requestBody) 
 * See 
 *
 * @method $this moveFolder(int|string $folder_id, array $requestBody) 
 * See 
 *
 * @method static $this deleteFolder(int|string $folder_id) 
 * See 
 *
 * @method $this deleteFolder(int|string $folder_id) 
 * See 
 *
 */
class FileV2Hubspot extends Hubspot
{
    protected string $resource = "files-v2";
}
