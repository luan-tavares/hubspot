<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> upload(array $requestBody) Upload a single file with content specified in request body.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> upload(array $requestBody) Upload a single file with content specified in request body.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> importFromUrl(array $requestBody) Asynchronously imports the file at the given URL into the file manager.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> importFromUrl(array $requestBody) Asynchronously imports the file at the given URL into the file manager.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> checkImport(int|string $taskId) Check the status of requested import.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> checkImport(int|string $taskId) Check the status of requested import.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<array<int, object>, object> getAll() Search through files in the file manager. Does not display hidden or archived files.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<array<int, object>, object> getAll() Search through files in the file manager. Does not display hidden or archived files.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> get(int|string $fileId) Get file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> get(int|string $fileId) Get file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> update(int|string $fileId, array $requestBody) Update properties of file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> update(int|string $fileId, array $requestBody) Update properties of file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> replace(int|string $fileId, array $requestBody) Replace existing file data with new file data.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> replace(int|string $fileId, array $requestBody) Replace existing file data with new file data.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> delete(int|string $fileId) Delete file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> delete(int|string $fileId) Delete file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> gdprDelete(int|string $fileId) GDRP delete file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> gdprDelete(int|string $fileId) GDRP delete file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> getPublicUrl(int|string $fileId) Generates signed URL that allows temporary access to a private file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> getPublicUrl(int|string $fileId) Generates signed URL that allows temporary access to a private file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> createFolder(array $requestBody) Creates a folder.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> createFolder(array $requestBody) Creates a folder.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<array<int, object>, object> getAllFolders() Search for folders. Does not contain hidden or archived folders.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<array<int, object>, object> getAllFolders() Search for folders. Does not contain hidden or archived folders.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> updateFolder(array $requestBody) Update properties of folder by given ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> updateFolder(array $requestBody) Update properties of folder by given ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> checkUpdateFolder(int|string $taskId) Check status of folder update. Folder updates happen asynchronously.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> checkUpdateFolder(int|string $taskId) Check status of folder update. Folder updates happen asynchronously.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> getFolder(int|string $folderIdOrPath) Get folder by ID or PATH.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> getFolder(int|string $folderIdOrPath) Get folder by ID or PATH.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object, null> deleteFolder(int|string $folderIdorPath) Delete folder by ID or Path.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object, null> deleteFolder(int|string $folderIdorPath) Delete folder by ID or Path.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 */
class FileHubspot extends Hubspot
{
    protected string $resource = "files-v3";

    protected int $version = 3;
}