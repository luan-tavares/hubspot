<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this upload(array $requestBody) Upload a single file with content specified in request body.
* @method $this upload(array $requestBody) Upload a single file with content specified in request body.
* @method static $this importFromUrl(array $requestBody) Asynchronously imports the file at the given URL into the file manager.
* @method $this importFromUrl(array $requestBody) Asynchronously imports the file at the given URL into the file manager.
* @method static $this checkImport(int|string $taskId) Check the status of requested import.
* @method $this checkImport(int|string $taskId) Check the status of requested import.
* @method static $this getAll() Search through files in the file manager. Does not display hidden or archived files.
* @method $this getAll() Search through files in the file manager. Does not display hidden or archived files.
* @method static $this get(int|string $fileId) Get file by ID.
* @method $this get(int|string $fileId) Get file by ID.
* @method static $this update(int|string $fileId, array $requestBody) Update properties of file by ID.
* @method $this update(int|string $fileId, array $requestBody) Update properties of file by ID.
* @method static $this replace(int|string $fileId, array $requestBody) Replace existing file data with new file data.
* @method $this replace(int|string $fileId, array $requestBody) Replace existing file data with new file data.
* @method static $this delete(int|string $fileId) Delete file by ID.
* @method $this delete(int|string $fileId) Delete file by ID.
* @method static $this gdprDelete(int|string $fileId) GDRP delete file.
* @method $this gdprDelete(int|string $fileId) GDRP delete file.
* @method static $this getPublicUrl(int|string $fileId) Generates signed URL that allows temporary access to a private file.
* @method $this getPublicUrl(int|string $fileId) Generates signed URL that allows temporary access to a private file.
* @method static $this createFolder(array $requestBody) Creates a folder.
* @method $this createFolder(array $requestBody) Creates a folder.
* @method static $this getAllFolders() Search for folders. Does not contain hidden or archived folders.
* @method $this getAllFolders() Search for folders. Does not contain hidden or archived folders.
* @method static $this updateFolder(array $requestBody) Update properties of folder by given ID.
* @method $this updateFolder(array $requestBody) Update properties of folder by given ID.
* @method static $this checkUpdateFolder(int|string $taskId) Check status of folder update. Folder updates happen asynchronously.
* @method $this checkUpdateFolder(int|string $taskId) Check status of folder update. Folder updates happen asynchronously.
* @method static $this getFolder(int|string $folderIdOrPath) Get folder by ID or PATH.
* @method $this getFolder(int|string $folderIdOrPath) Get folder by ID or PATH.
* @method static $this deleteFolder(int|string $folderIdorPath) Delete folder by ID or Path.
* @method $this deleteFolder(int|string $folderIdorPath) Delete folder by ID or Path.
 */
class FileHubspot extends Hubspot
{
    protected string $resource = "files-v3";
}
