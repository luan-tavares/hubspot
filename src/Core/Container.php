<?php

namespace LTL\HubspotApi\Core;

use LTL\HubspotApi\Core\Builder;
use LTL\HubspotApi\Interfaces\ResourceInterface;
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
}
