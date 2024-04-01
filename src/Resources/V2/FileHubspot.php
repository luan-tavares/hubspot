<?php

namespace LTL\Hubspot\Resources\V2;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<object> upload(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_new_file
 *
 * @method self<object> upload(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_new_file
 *
 * @method static self<null> replace(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_replacement_file
 *
 * @method self<null> replace(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_replacement_file
 *
 * @method static self<null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files
 *
 * @method self<null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files
 *
 * @method static self<null> get(int|string $file_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files_file_id
 *
 * @method self<null> get(int|string $file_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files_file_id
 *
 * @method static self<null> changeAccess(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/update_file_access
 *
 * @method self<null> changeAccess(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/update_file_access
 *
 * @method static self<null> delete(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/hard_delete_file_and_associated_objects
 *
 * @method self<null> delete(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/hard_delete_file_and_associated_objects
 *
 * @method static self<null> getPublicUrl(int|string $fileId) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get-signed-url-private-file
 *
 * @method self<null> getPublicUrl(int|string $fileId) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get-signed-url-private-file
 *
 * @method static self<null> move(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_files_file_id_move_file
 *
 * @method self<null> move(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_files_file_id_move_file
 *
 * @method static self<null> getAllFolders() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders
 *
 * @method self<null> getAllFolders() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders
 *
 * @method static self<null> getFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders_folder_id
 *
 * @method self<null> getFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders_folder_id
 *
 * @method static self<null> createFolder(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders
 *
 * @method self<null> createFolder(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders
 *
 * @method static self<null> moveFolder(int|string $folder_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders_folder_id_move_folder
 *
 * @method self<null> moveFolder(int|string $folder_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders_folder_id_move_folder
 *
 * @method static self<null> deleteFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/delete_folders_folder_id
 *
 * @method self<null> deleteFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/delete_folders_folder_id
 *
 */
class FileHubspot extends Hubspot
{
    protected string $resource = "files-v2";

    protected int $version = 2;
}