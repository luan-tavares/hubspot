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
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/domains
 *
 * @method static self<array<int, object>, object> getAll() Returns all existing domains that have been created. Results can be limited and filtered by creation or updated date.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/domains
 *
 * @method self<array<int, object>, object> getAll() Returns all existing domains that have been created. Results can be limited and filtered by creation or updated date.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/domains
 *
 * @method static self<object, null> get(int|string $domainId) Returns a single domains with the id specified.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/domains
 *
 * @method self<object, null> get(int|string $domainId) Returns a single domains with the id specified.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/cms/v3/domains
 *
 */
class CmsDomainHubspot extends Hubspot
{
    protected string $resource = "cms-domains-v3";

    protected int $version = 3;
}