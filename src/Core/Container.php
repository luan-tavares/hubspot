<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Request\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use ReflectionObject;
use stdClass;

abstract class Container
{
    private static $map;

    private static $apikey;

    private static $singleton = [];

    public static $ob;

    public static function singleton(string $class): object
    {
        if (!isset(self::$singleton[$class])) {
            self::$singleton[$class] = new $class;
        }

        return self::$singleton[$class];
    }

    private static function map(ResourceInterface $resource): stdClass
    {
        if (!isset(self::$map[get_class($resource)])) {
            self::$map[get_class($resource)] = new stdClass;

            $map = &self::$map[get_class($resource)];
            
            $map->schema = new Schema($resource);
            $map->builder = new Builder($resource);
        }

        return self::$map[get_class($resource)];
    }

    public static function getBuilder(ResourceInterface $resource): Builder
    {
        return self::map($resource)->builder;
    }

    public static function getSchema(ResourceInterface $resource): Schema
    {
        return self::map($resource)->schema;
    }

    public static function apikey(?string $apikey = null): ?string
    {
        if (!is_null($apikey)) {
            self::$apikey = $apikey;
        }

        return self::$apikey;
    }

    public static function setResponseToResource(ResourceInterface $resource, ResponseInterface $response)
    {
        $reflector = new ReflectionObject($resource);

        $property = $reflector->getProperty('response');
        $property->setValue($resource, $response);

        $property = $reflector->getProperty('documentation');
        $property->setValue($resource, self::getDocumentation($resource));
              
        return $resource;
    }

    private static function getDocumentation(ResourceInterface $resource): ?string
    {
        $schema = self::getSchema($resource);
        $documentation = @$schema->getActionSchema($resource->action())['documentation'];
        
        if (!is_null(@$documentation)) {
            return $documentation;
        }

        return @$schema['documentation'];
    }
}
