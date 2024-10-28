<?php

namespace LTL\Hubspot\Resources\V4;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/automation/workflows
 *
 * @method static self<object> getAll() 
 * See https://developers.hubspot.com/docs/api/automation/workflows
 *
 * @method self<object> getAll() 
 * See https://developers.hubspot.com/docs/api/automation/workflows
 *
 * @method static self<null> create(array $requestBody) 
 * See https://developers.hubspot.com/docs/api/automation/workflows
 *
 * @method self<null> create(array $requestBody) 
 * See https://developers.hubspot.com/docs/api/automation/workflows
 *
 * @method static self<null> get(int|string $flowId) 
 * See https://developers.hubspot.com/docs/api/automation/workflows
 *
 * @method self<null> get(int|string $flowId) 
 * See https://developers.hubspot.com/docs/api/automation/workflows
 *
 * @method static self<null> delete(int|string $flowId) 
 * See https://developers.hubspot.com/docs/api/automation/workflows
 *
 * @method self<null> delete(int|string $flowId) 
 * See https://developers.hubspot.com/docs/api/automation/workflows
 *
 */
class WorkflowHubspot extends Hubspot
{
    protected string $resource = "workflows-v4";

    protected int $version = 4;
}