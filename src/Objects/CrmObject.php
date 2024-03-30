<?php

namespace LTL\Hubspot\Objects;

use LTL\Hubspot\Objects\Interfaces\ObjectInterface;

class CrmObject implements ObjectInterface
{
    public readonly int $id;

    public readonly string $createdAt;

    public readonly string $updatedAt;

    public readonly string|null $archivedAt;

    public readonly bool $archived;

    public readonly object $properties;

    public readonly object|null $associations;

    public readonly object|null $propertiesWithHistory;
}
