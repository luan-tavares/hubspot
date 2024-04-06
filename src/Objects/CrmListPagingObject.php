<?php

namespace LTL\Hubspot\Objects;

use LTL\Hubspot\Objects\CrmListPagingNextObject;
use LTL\Hubspot\Objects\Interfaces\ObjectInterface;

class CrmListPagingObject implements ObjectInterface
{
    public readonly CrmListPagingNextObject $next;
}
