<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Interfaces\BuilderInterface;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Interfaces\FactoryInterface;
use ReflectionClass;

abstract class BuilderFactory implements FactoryInterface
{
    public static function build(ResourceInterface $resource): BuilderInterface
    {
        $reflectionClass = SingletonContainer::get(Builder::class, function ($class) {
            return new ReflectionClass($class);
        });

        $object = $reflectionClass->newInstanceWithoutConstructor();

        $reflectionProperty = $reflectionClass->getProperty('baseResource');
        $reflectionProperty->setValue($object, $resource);

        $reflectionProperty = $reflectionClass->getProperty('request');
        $reflectionProperty->setValue($object, RequestContainer::get($resource));
   
        return $object;
    }
}
