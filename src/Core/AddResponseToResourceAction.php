<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Resource\Resource;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use ReflectionProperty;

abstract class AddResponseToResourceAction
{
    public static function execute(ResourceInterface $resource, ResponseInterface $response): ResourceInterface
    {
        $property = 'response';

        $reflectionProperty = SingletonContainer::get($property, function ($property) {
            return new ReflectionProperty(Resource::class, $property);
        });

        $copy = clone $resource;

        $reflectionProperty->setValue($copy, $response);

        return $copy;
    }
}
