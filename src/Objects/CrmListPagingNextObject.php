<?php

namespace LTL\Hubspot\Objects;

use LTL\Hubspot\Objects\Interfaces\ObjectInterface;

class CrmListPagingNextObject implements ObjectInterface
{
    public readonly string $after;

    public readonly string $link;
}
