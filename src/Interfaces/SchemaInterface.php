<?php

namespace LTL\HubspotApi\Interfaces;

use LTL\HubspotApi\Exceptions\HubspotResourceException;

interface SchemaInterface
{
    /**
     * Get Method from schema
     *
     * @param string $method
     * @return array
     * @throws HubspotResourceException
     */
    public function getMethodSchema(string $method): array;
}
