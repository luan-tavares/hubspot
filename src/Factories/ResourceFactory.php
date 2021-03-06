<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Interfaces\FactoryInterface;
use ReflectionClass;

abstract class ResourceFactory implements FactoryInterface
{
    public static function build(ResourceInterface $resource, ResponseInterface $response): ResourceInterface
    {
        $reflectionClass = SingletonContainer::get($resource::class, function ($class) {
            return new ReflectionClass($class);
        });

        $newResource = $reflectionClass->newInstance();

        $reflectionProperty = $reflectionClass->getProperty('response');
        $reflectionProperty->setValue($newResource, $response);
   
        return $newResource;
    }
}
