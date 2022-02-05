<?php

namespace LTL\Hubspot\Core\Schemas\Interfaces;

use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;

interface ResourceSchemaInterface
{
    public function getActionDefinition(string $action): ActionSchemaInterface;
    public function getActions(): array;
    public function mapWithActions(callable $callback): array;
}
