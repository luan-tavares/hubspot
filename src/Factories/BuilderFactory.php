<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Interfaces\BuilderInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Interfaces\FactoryInterface;
use ReflectionClass;

abstract class BuilderFactory implements FactoryInterface
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
