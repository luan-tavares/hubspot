<?php

namespace LTL\Hubspot\Resources\V2;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @method static $this upload(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_new_file
 *
 * @method $this upload(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_new_file
 *
 * @method static $this replace(int|string $file_id, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_replacement_file
 *
 * @method $this replace(int|string $file_id, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_replacement_file
 *
 * @method static $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files
 *
 * @method $this getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files
 *
 * @method static $this get(int|string $file_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files_file_id
 *
 * @method $this get(int|string $file_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files_file_id
 *
 * @method static $this changeAccess(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/update_file_access
 *
 * @method $this changeAccess(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/update_file_access
 *
 * @method static $this delete(int|string $file_id, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/hard_delete_file_and_associated_objects
 *
 * @method $this delete(int|string $file_id, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/hard_delete_file_and_associated_objects
 *
 * @method static $this getPublicUrl(int|string $fileId) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get-signed-url-private-file
 *
 * @method $this getPublicUrl(int|string $fileId) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get-signed-url-private-file
 *
 * @method static $this move(int|string $file_id, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_files_file_id_move_file
 *
 * @method $this move(int|string $file_id, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_files_file_id_move_file
 *
 * @method static $this getAllFolders() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders
 *
 * @method $this getAllFolders() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders
 *
 * @method static $this getFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders_folder_id
 *
 * @method $this getFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders_folder_id
 *
 * @method static $this createFolder(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders
 *
 * @method $this createFolder(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders
 *
 * @method static $this moveFolder(int|string $folder_id, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders_folder_id_move_folder
 *
 * @method $this moveFolder(int|string $folder_id, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders_folder_id_move_folder
 *
 * @method static $this deleteFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/delete_folders_folder_id
 *
 * @method $this deleteFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/delete_folders_folder_id
 *
 */
class FileHubspot extends Hubspot
{
    protected string $resource = "files-v2";

    protected int $version = 2;
}