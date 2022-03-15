<?php

namespace LTL\Hubspot\Core\Interfaces\Schemas;

use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;

interface ResourceSchemaInterface
{
    public function getActionDefinition(string $action): ActionSchemaInterface;
    public function getActions(): array;
    public function getAction(string $action): object;
}
