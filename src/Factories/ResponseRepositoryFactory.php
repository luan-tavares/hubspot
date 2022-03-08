<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Core\Interfaces\Response\ResponseRepositoryInterface;
use LTL\Hubspot\Core\Response\ResponseRepository;
use LTL\Hubspot\Interfaces\FactoryInterface;
use ReflectionClass;

abstract class ResponseRepositoryFactory implements FactoryInterface
{
    public static function build(ResponseInterface $response): ResponseRepositoryInterface
    {
        $reflectionClass = SingletonContainer::get(ResponseRepository::class, function ($class) {
            return new ReflectionClass($class);
        });

        $ResponseRepository = $reflectionClass->newInstanceWithoutConstructor();

        $object = json_decode($response->toJson());

        $reflectionProperty = $reflectionClass->getProperty('object');
        $reflectionProperty->setValue($ResponseRepository, $object);

        $reflectionProperty = $reflectionClass->getProperty('array');
        $reflectionProperty->setValue($ResponseRepository, json_decode($response->toJson(), true) ?? []);

        $reflectionProperty = $reflectionClass->getProperty('iterator');
        $reflectionProperty->setValue($ResponseRepository, self::setIterator($response, $object));

        $reflectionProperty = $reflectionClass->getProperty('after');
        $reflectionProperty->setValue($ResponseRepository, self::setAfter($response, $object));

        return $ResponseRepository;
    }

    private static function setIterator(ResponseInterface $response, object|array|null $object): array|null
    {
        if (is_array($object)) {
            return $object;
        }

        if (is_null(@$object->{$response->getIteratorIndex()})) {
            return null;
        }

        return (array) $object->{$response->getIteratorIndex()};
    }


    private static function setAfter(ResponseInterface $response, object|array|null $object): int|string|null
    {
        if (is_null($response->getAfterIndex())) {
            return null;
        }

        $mapList = explode('.', $response->getAfterIndex());
  
        $after = $object;
       
        foreach ($mapList as $current) {
            if (!isset($after->{$current})) {
                return null;
            }
            $after = @$after->{$current};
        }
       
        return $after;
    }
}
