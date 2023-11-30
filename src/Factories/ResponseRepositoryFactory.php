<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseRepositoryInterface;
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

        $responseRepository = $reflectionClass->newInstanceWithoutConstructor();

        $rawResponse = $response->toJson();

        $object = json_decode($rawResponse);

        $reflectionProperty = $reflectionClass->getProperty('object');
        $reflectionProperty->setValue($responseRepository, $object);

        $reflectionProperty = $reflectionClass->getProperty('array');
        $reflectionProperty->setValue($responseRepository, json_decode($rawResponse, true) ?? []);

        $reflectionProperty = $reflectionClass->getProperty('iterator');
        $reflectionProperty->setValue($responseRepository, self::setIterator($response, $object));

        $reflectionProperty = $reflectionClass->getProperty('after');
        $reflectionProperty->setValue($responseRepository, self::setAfter($response, $object));

        return $responseRepository;
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
