<?php

namespace LTL\Hubspot\Core\Interfaces;

use LTL\Hubspot\Core\Exceptions\HubspotResourceException;

interface SchemaInterface
{
    /**
     * Get Method from schema
     *
     * @param string $method
     * @return array
     * @throws HubspotResourceException
     */
    public function getActionSchema(string $method): array;
}
