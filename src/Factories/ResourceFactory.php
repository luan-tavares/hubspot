<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use ReflectionClass;

abstract class ResourceFactory
{
    public static function build(ResourceInterface $baseResource, ResponseInterface $response): ResourceInterface
    {
        /**
         * @var ReflectionClass $reflectionClass
         */
        $reflectionClass = SingletonContainer::get($baseResource::class, function ($class) {
            return new ReflectionClass($class);
        });

        $newResource = $reflectionClass->newInstanceWithoutConstructor();

        $reflectionProperty = $reflectionClass->getProperty('response');
        $reflectionProperty->setValue($newResource, $response);
   
        return $newResource;
    }
}
