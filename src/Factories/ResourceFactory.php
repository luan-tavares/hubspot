<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Factories\Interfaces\FactoryInterface;
use ReflectionClass;

abstract class ResourceFactory implements FactoryInterface
{
    public static function build(ResourceInterface $resource, ResponseInterface $response): ResourceInterface
    {
        $reflectionClass = SingletonContainer::get($resource::class, function ($class) {
            return new ReflectionClass($class);
        });

        $object = $reflectionClass->newInstance();

        $reflectionProperty = $reflectionClass->getProperty('response');
        $reflectionProperty->setValue($object, $response);
   
        return $object;
    }
}