<?php

namespace LTL\Hubspot\Core\Schema\Interfaces;

use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;

interface ResourceSchemaInterface
{
    public function getActionDefinition(string $action): ActionSchemaInterface;
    public function getActions(): array;
    public function getAction(string $action): object;
}
