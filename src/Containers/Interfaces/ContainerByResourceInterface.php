<?php

namespace LTL\Hubspot\Containers\Interfaces;

use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

interface ContainerByResourceInterface
{
    public static function get(ResourceInterface $resource): object;
}
