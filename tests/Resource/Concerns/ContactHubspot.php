<?php

namespace LTL\Hubspot\Tests\Resource\Concerns;

use LTL\Hubspot\Concerns\WithEnrollUpdateList;
use LTL\Hubspot\Concerns\WithListFilters;
use LTL\Hubspot\Concerns\WithMaxLimit;
use LTL\Hubspot\Resources\V3;

class ContactHubspot extends V3\ContactHubspot implements WithEnrollUpdateList, WithMaxLimit, WithListFilters
{

}
