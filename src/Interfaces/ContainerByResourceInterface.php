<?php

namespace LTL\Hubspot\Interfaces;

use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;

interface ContainerByResourceInterface
{
    public static function get(ResourceInterface $resource): object;
}
