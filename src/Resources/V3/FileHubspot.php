<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> upload(array $requestBody) Upload a single file with content specified in request body.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> upload(array $requestBody) Upload a single file with content specified in request body.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> importFromUrl(array $requestBody) Asynchronously imports the file at the given URL into the file manager.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> importFromUrl(array $requestBody) Asynchronously imports the file at the given URL into the file manager.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> checkImport(int|string $taskId) Check the status of requested import.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> checkImport(int|string $taskId) Check the status of requested import.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object> getAll() Search through files in the file manager. Does not display hidden or archived files.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object> getAll() Search through files in the file manager. Does not display hidden or archived files.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> get(int|string $fileId) Get file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> get(int|string $fileId) Get file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> update(int|string $fileId, array $requestBody) Update properties of file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> update(int|string $fileId, array $requestBody) Update properties of file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> replace(int|string $fileId, array $requestBody) Replace existing file data with new file data.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> replace(int|string $fileId, array $requestBody) Replace existing file data with new file data.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> delete(int|string $fileId) Delete file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> delete(int|string $fileId) Delete file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> gdprDelete(int|string $fileId) GDRP delete file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> gdprDelete(int|string $fileId) GDRP delete file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> getPublicUrl(int|string $fileId) Generates signed URL that allows temporary access to a private file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> getPublicUrl(int|string $fileId) Generates signed URL that allows temporary access to a private file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> createFolder(array $requestBody) Creates a folder.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> createFolder(array $requestBody) Creates a folder.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<object> getAllFolders() Search for folders. Does not contain hidden or archived folders.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<object> getAllFolders() Search for folders. Does not contain hidden or archived folders.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> updateFolder(array $requestBody) Update properties of folder by given ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> updateFolder(array $requestBody) Update properties of folder by given ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> checkUpdateFolder(int|string $taskId) Check status of folder update. Folder updates happen asynchronously.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> checkUpdateFolder(int|string $taskId) Check status of folder update. Folder updates happen asynchronously.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> getFolder(int|string $folderIdOrPath) Get folder by ID or PATH.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> getFolder(int|string $folderIdOrPath) Get folder by ID or PATH.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static self<null> deleteFolder(int|string $folderIdorPath) Delete folder by ID or Path.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method self<null> deleteFolder(int|string $folderIdorPath) Delete folder by ID or Path.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 */
class FileHubspot extends Hubspot
{
    protected string $resource = "files-v3";

    protected int $version = 3;
}