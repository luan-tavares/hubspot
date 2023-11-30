<?php

namespace LTL\Hubspot\Interfaces;

use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

interface ContainerByResourceInterface
{
    public static function get(ResourceInterface $resource): object;
    public static function destroy(ResourceInterface $resource): void;
}
