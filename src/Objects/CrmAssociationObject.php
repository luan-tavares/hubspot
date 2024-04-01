<?php

namespace LTL\Hubspot\Objects;

use LTL\Hubspot\Objects\Interfaces\ObjectInterface;

class CrmAssociationObject implements ObjectInterface
{
    public readonly int $id;

    public readonly string $type;
}
