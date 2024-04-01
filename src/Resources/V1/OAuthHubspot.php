<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method static self<null> getAccessToken(int|string $token) Get access-token info.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method self<null> getAccessToken(int|string $token) Get access-token info.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method static self<null> getRefreshToken(int|string $token) Get access-token info.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method self<null> getRefreshToken(int|string $token) Get access-token info.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method static self<null> deleteRefreshToken(int|string $token) Delete refresh-token.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method self<null> deleteRefreshToken(int|string $token) Delete refresh-token.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method static self<null> createOrRefresh(array $requestBody) Install or Refresh App and create token.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method self<null> createOrRefresh(array $requestBody) Install or Refresh App and create token.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 */
class OAuthHubspot extends Hubspot
{
    protected string $resource = "o-auth-v1";

    protected int $version = 1;
}