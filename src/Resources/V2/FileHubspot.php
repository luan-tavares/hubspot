<?php

namespace LTL\Hubspot\Resources\V2;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @method static self<array<int, object>, object> upload(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_new_file
 *
 * @method self<array<int, object>, object> upload(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_new_file
 *
 * @method static self<object, null> replace(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_replacement_file
 *
 * @method self<object, null> replace(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/v3/upload_replacement_file
 *
 * @method static self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files
 *
 * @method self<object, null> getAll() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files
 *
 * @method static self<object, null> get(int|string $file_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files_file_id
 *
 * @method self<object, null> get(int|string $file_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_files_file_id
 *
 * @method static self<object, null> changeAccess(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/update_file_access
 *
 * @method self<object, null> changeAccess(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/update_file_access
 *
 * @method static self<object, null> delete(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/hard_delete_file_and_associated_objects
 *
 * @method self<object, null> delete(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/hard_delete_file_and_associated_objects
 *
 * @method static self<object, null> getPublicUrl(int|string $fileId) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get-signed-url-private-file
 *
 * @method self<object, null> getPublicUrl(int|string $fileId) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get-signed-url-private-file
 *
 * @method static self<object, null> move(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_files_file_id_move_file
 *
 * @method self<object, null> move(int|string $file_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_files_file_id_move_file
 *
 * @method static self<object, null> getAllFolders() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders
 *
 * @method self<object, null> getAllFolders() 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders
 *
 * @method static self<object, null> getFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders_folder_id
 *
 * @method self<object, null> getFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/get_folders_folder_id
 *
 * @method static self<object, null> createFolder(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders
 *
 * @method self<object, null> createFolder(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders
 *
 * @method static self<object, null> moveFolder(int|string $folder_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders_folder_id_move_folder
 *
 * @method self<object, null> moveFolder(int|string $folder_id, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/files/post_folders_folder_id_move_folder
 *
 * @method static self<object, null> deleteFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/delete_folders_folder_id
 *
 * @method self<object, null> deleteFolder(int|string $folder_id) 
 * See https://legacydocs.hubspot.com/docs/methods/files/delete_folders_folder_id
 *
 */
class FileHubspot extends Hubspot
{
    protected string $resource = "files-v2";

    protected int $version = 2;
}