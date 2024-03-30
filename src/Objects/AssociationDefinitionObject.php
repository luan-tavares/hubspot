<?php

namespace LTL\Hubspot\Objects;

use LTL\Hubspot\Objects\Interfaces\ObjectInterface;

class AssociationDefinitionObject implements ObjectInterface
{
    public readonly int $typeId;

    public readonly string|null $label;

    public readonly string $category;
}
