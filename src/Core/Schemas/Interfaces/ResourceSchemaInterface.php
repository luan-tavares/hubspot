<?php

namespace LTL\Hubspot\Core\Schemas\Interfaces;

use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;

interface ResourceSchemaInterface
{
    /**
     * Get Method from schema
     *
     * @param string $method
     * @return ActionSchemaInterface
     * @throws HubspotApiException
     */
    public function getActionSchema(string $method): ActionSchemaInterface;
    public function getActions(): array;
    public function mapWithActions(callable $function): array;
}
