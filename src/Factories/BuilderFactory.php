<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\BuilderInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use ReflectionClass;

abstract class BuilderFactory
{
    public static function build(ResourceInterface $baseResource, RequestInterface $request): BuilderInterface
    {
        $reflectionClass = SingletonContainer::get(Builder::class, function ($class) {
            return new ReflectionClass($class);
        });

        $object = $reflectionClass->newInstanceWithoutConstructor();

        $reflectionProperty = $reflectionClass->getProperty('baseResource');
        $reflectionProperty->setValue($object, $baseResource);

        $reflectionProperty = $reflectionClass->getProperty('request');
        $reflectionProperty->setValue($object, $request);
   
        return $object;
    }
}
