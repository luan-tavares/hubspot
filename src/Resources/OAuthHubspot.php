<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method static $this getAccessToken(int|string $token) Get access-token info.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method $this getAccessToken(int|string $token) Get access-token info.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method static $this getRefreshToken(int|string $token) Get access-token info.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method $this getRefreshToken(int|string $token) Get access-token info.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method static $this deleteRefreshToken(int|string $token) Delete refresh-token.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method $this deleteRefreshToken(int|string $token) Delete refresh-token.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method static $this createOrRefresh(array $requestBody) Install or Refresh App and create token.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 * @method $this createOrRefresh(array $requestBody) Install or Refresh App and create token.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/auth/v1/oauth
 *
 */
class OAuthHubspot extends Hubspot
{
    protected string $resource = "o-auth-v1";
}
