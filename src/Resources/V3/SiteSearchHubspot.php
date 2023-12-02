<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/site-search
 *
 * @method static $this getIndexes(int|string $contentId) For a given account and document ID (page ID, blog post ID, HubDB row ID, etc.), return all indexed data for that document.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/site-search
 *
 * @method $this getIndexes(int|string $contentId) For a given account and document ID (page ID, blog post ID, HubDB row ID, etc.), return all indexed data for that document.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/site-search
 *
 * @method static $this search() Returns any website content matching the given search criteria for a given HubSpot account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/site-search
 *
 * @method $this search() Returns any website content matching the given search criteria for a given HubSpot account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/site-search
 *
 */
class SiteSearchHubspot extends Hubspot
{
    protected string $resource = "site-search-v3";

    protected int $version = 3;
}