<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Objects\ErrorObject;
use LTL\Hubspot\Objects\Interfaces\ObjectInterface;
use ReflectionClass;
use ReflectionProperty;
use TypeError;

abstract class ObjectFactory
{
    public static function build(
        array|object|null $objectResponse,
        ActionSchemaInterface $actionSchema,
        bool $hasError
    ): array|object|null {
        $data = self::getResultData($actionSchema, $objectResponse);

        if(is_null($object = $actionSchema->object) && !$hasError) {
            return $data;
        }

        /**HTML Error */
        if(is_null($data) && $hasError) {
            return $data;
        }

        if($hasError) {
            $object = ErrorObject::class;
        }

        /**
         * @var ReflectionClass<ObjectInterface> $reflectionClass
         */
        $reflectionClass = new ReflectionClass($object);

        $reflectionProperties = $reflectionClass->getProperties(ReflectionProperty::IS_PUBLIC|ReflectionProperty::IS_READONLY);

        if(!is_array($data)) {
            return self::setProperties($reflectionClass, $reflectionProperties, $objectResponse);
        }

        $final = array_map(function (object $objectResponse) use ($reflectionClass, $reflectionProperties) {
            return self::setProperties($reflectionClass, $reflectionProperties, $objectResponse);
        }, $data);

        return $final;
    }

    /**
     * @param ReflectionClass<ObjectInterface> $reflectionClass
     * @param array<ReflectionProperty> $reflectionProperties
     */
    private static function setProperties(
        ReflectionClass $reflectionClass,
        array $reflectionProperties,
        object $objectResponse
    ): ObjectInterface {
        $final = $reflectionClass->newInstanceWithoutConstructor();

        $errors = null;
        
        try {
            foreach ($reflectionProperties as $property) {
                $property->setValue($final, @$objectResponse->{$property->name});
            }
        } catch(TypeError) {
            $errors[] = $property->name;
        }

        if(!is_null($errors)) {
            throw new HubspotApiException('Missing: '. implode(',', $errors));
        }
       
        return $final;
    }

    private static function getResultData(
        ActionSchemaInterface $actionSchema,
        object|array|null $objectResponse
    ): array|object|null {
        if (is_array($objectResponse)) {
            return $objectResponse;
        }

        if(is_null($iteratorIndex = $actionSchema->iteratorIndex)) {
            return $objectResponse;
        }

        return @$objectResponse->{$iteratorIndex};
    }
}
