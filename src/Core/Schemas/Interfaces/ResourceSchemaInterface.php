<?php

namespace LTL\Hubspot\Core\Schemas\Interfaces;

use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;

interface ResourceSchemaInterface
{
    /**
     * Get Method from schema
     *
     * @param string $action
     * @return ActionSchemaInterface
     * @throws HubspotApiException
     */
    public function getActionDefinition(string $action): ActionSchemaInterface;
    public function getActions(): array;
    public function mapWithActions(callable $function): array;
}
