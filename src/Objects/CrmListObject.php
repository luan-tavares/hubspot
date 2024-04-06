<?php

namespace LTL\Hubspot\Objects;

use LTL\Hubspot\Objects\CrmListPagingObject;
use LTL\Hubspot\Objects\Interfaces\ObjectInterface;

class CrmListObject implements ObjectInterface
{
    public readonly array $results;

    public readonly CrmListPagingObject $paging;
}
