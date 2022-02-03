<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schemas\ResourceSchema;
use ReflectionProperty;

abstract class Container
{
    private static array $builders = [];

    private static array $schemas = [];

    private static array $requests = [];

    private static array $reflectionProperties = [];

    private static $apikey;

    private static $singleton = [];

    public static function singleton(string $class): object
    {
        if (!isset(self::$singleton[$class])) {
            self::$singleton[$class] = new $class;
        }

        return self::$singleton[$class];
    }

    public static function getRequest(ResourceInterface $resource): RequestInterface
    {
        $hash = spl_object_hash($resource);


        if (!array_key_exists($hash, self::$requests)) {
            self::$requests[$hash] = new Request($resource);
        }
        self::$requests[$hash]->reset();

        return self::$requests[$hash];
    }


    public static function getBuilder(ResourceInterface $resource): Builder
    {
        $hash = spl_object_hash($resource);


        if (!array_key_exists($hash, self::$builders)) {
            self::$builders[$hash] = new Builder($resource);
        }
        
        return self::$builders[$hash];
    }

    public static function getSchema(ResourceInterface $resource): ResourceSchemaInterface
    {
        $hash = get_class($resource);

        if (!array_key_exists($hash, self::$schemas)) {
            self::$schemas[$hash] = new ResourceSchema($resource);
        }

        return self::$schemas[$hash];
    }

    public static function getActionDefinition(ResourceInterface $resource, string $action): ActionSchemaInterface
    {
        $hash = get_class($resource);

        if (!array_key_exists($hash, self::$schemas)) {
            self::$schemas[$hash] = new ResourceSchema($resource);
        }

        return self::$schemas[$hash]->getActionDefinition($action);
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
        $copy = $resource;

        self::getResourceReflectionProperty('response')->setValue($copy, $response);

        return $copy;
    }

    private static function getResourceReflectionProperty(string $property): ReflectionProperty
    {
        if (!array_key_exists($property, self::$reflectionProperties)) {
            self::$reflectionProperties[$property] = new ReflectionProperty(Resource::class, $property);
        }

        return self::$reflectionProperties[$property];
    }
}
