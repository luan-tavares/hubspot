<?php

namespace LTL\Hubspot\Objects;

use LTL\Hubspot\Objects\Interfaces\ObjectInterface;

class AssociationObject implements ObjectInterface
{
    public readonly int $toObjectId;

    public readonly array $associationTypes;
}
