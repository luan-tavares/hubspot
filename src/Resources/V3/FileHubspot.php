<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this upload(BaseBodyBuilder|array $requestBody) Upload a single file with content specified in request body.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this upload(BaseBodyBuilder|array $requestBody) Upload a single file with content specified in request body.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this importFromUrl(BaseBodyBuilder|array $requestBody) Asynchronously imports the file at the given URL into the file manager.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this importFromUrl(BaseBodyBuilder|array $requestBody) Asynchronously imports the file at the given URL into the file manager.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this checkImport(int|string $taskId) Check the status of requested import.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this checkImport(int|string $taskId) Check the status of requested import.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this getAll() Search through files in the file manager. Does not display hidden or archived files.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this getAll() Search through files in the file manager. Does not display hidden or archived files.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this get(int|string $fileId) Get file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this get(int|string $fileId) Get file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this update(int|string $fileId, BaseBodyBuilder|array $requestBody) Update properties of file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this update(int|string $fileId, BaseBodyBuilder|array $requestBody) Update properties of file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this replace(int|string $fileId, BaseBodyBuilder|array $requestBody) Replace existing file data with new file data.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this replace(int|string $fileId, BaseBodyBuilder|array $requestBody) Replace existing file data with new file data.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this delete(int|string $fileId) Delete file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this delete(int|string $fileId) Delete file by ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this gdprDelete(int|string $fileId) GDRP delete file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this gdprDelete(int|string $fileId) GDRP delete file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this getPublicUrl(int|string $fileId) Generates signed URL that allows temporary access to a private file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this getPublicUrl(int|string $fileId) Generates signed URL that allows temporary access to a private file.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this createFolder(BaseBodyBuilder|array $requestBody) Creates a folder.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this createFolder(BaseBodyBuilder|array $requestBody) Creates a folder.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this getAllFolders() Search for folders. Does not contain hidden or archived folders.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this getAllFolders() Search for folders. Does not contain hidden or archived folders.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this updateFolder(BaseBodyBuilder|array $requestBody) Update properties of folder by given ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this updateFolder(BaseBodyBuilder|array $requestBody) Update properties of folder by given ID.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this checkUpdateFolder(int|string $taskId) Check status of folder update. Folder updates happen asynchronously.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this checkUpdateFolder(int|string $taskId) Check status of folder update. Folder updates happen asynchronously.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this getFolder(int|string $folderIdOrPath) Get folder by ID or PATH.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this getFolder(int|string $folderIdOrPath) Get folder by ID or PATH.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method static $this deleteFolder(int|string $folderIdorPath) Delete folder by ID or Path.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 * @method $this deleteFolder(int|string $folderIdorPath) Delete folder by ID or Path.
 * See https://developers.hubspot.com/docs/api/files/files
 *
 */
class FileHubspot extends Hubspot
{
    protected string $resource = "files-v3";

    protected int $version = 3;
}