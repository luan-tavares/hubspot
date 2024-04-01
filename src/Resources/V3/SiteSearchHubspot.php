<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/site-search
 *
 * @method static self<object> getIndexes(int|string $contentId) For a given account and document ID (page ID, blog post ID, HubDB row ID, etc.), return all indexed data for that document.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/site-search
 *
 * @method self<object> getIndexes(int|string $contentId) For a given account and document ID (page ID, blog post ID, HubDB row ID, etc.), return all indexed data for that document.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/site-search
 *
 * @method static self<object> search() Returns any website content matching the given search criteria for a given HubSpot account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/site-search
 *
 * @method self<object> search() Returns any website content matching the given search criteria for a given HubSpot account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/site-search
 *
 */
class SiteSearchHubspot extends Hubspot
{
    protected string $resource = "site-search-v3";

    protected int $version = 3;
}