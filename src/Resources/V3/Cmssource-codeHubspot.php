<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method static self<null> create(int|string $environment, int|string $path, array $requestBody) Save asset to design manager.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method self<null> create(int|string $environment, int|string $path, array $requestBody) Save asset to design manager.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method static self<null> get(int|string $environment, int|string $path) Get cms content.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method self<null> get(int|string $environment, int|string $path) Get cms content.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method static self<null> getMetadata(int|string $environment, int|string $path) Get cms metadata content.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method self<null> getMetadata(int|string $environment, int|string $path) Get cms metadata content.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method static self<null> createOrUpdate(int|string $environment, int|string $path, array $requestBody) Upload cms content file.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method self<null> createOrUpdate(int|string $environment, int|string $path, array $requestBody) Upload cms content file.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method static self<null> validate(int|string $environment, int|string $path, array $requestBody) Validate content.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method self<null> validate(int|string $environment, int|string $path, array $requestBody) Validate content.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method static self<null> delete(int|string $environment, int|string $path) Delete cms content file.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 * @method self<null> delete(int|string $environment, int|string $path) Delete cms content file.
 * See https://developers.hubspot.com/docs/api-reference/latest/cms/source-code/guide
 *
 */
class Cmssource-codeHubspot extends Hubspot
{
    protected string $resource = "cms-sourcecode-v3";

    protected int $version = 3;
}