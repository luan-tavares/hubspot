<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Response\AfterResponse;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Objects\Interfaces\ObjectInterface;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionProperty;

class ResponseObject
{
    public readonly object|array|null $result;

    public readonly string|int|null $after;

    public readonly bool $isIterator;

    public readonly bool $hasErrorIfPropertyNotExists;

    public function __construct(
        ActionSchema $actionSchema,
        CurlInterface $curl,
        RequestInfoObject $requestInfoObject
    ) {
        $objectResponse = json_decode($curl->response());

        $this->hasErrorIfPropertyNotExists = $requestInfoObject->hasErrorIfPropertyNotExists;

        $this->after = AfterResponse::get($actionSchema, $objectResponse);

        $this->isIterator = IsIteratorResponse::get($actionSchema, $objectResponse);

        if (is_null($objectResponse)) {
            $this->result = null;

            return;
        }

        if (!$requestInfoObject->hasObject || is_null($objectClass = $actionSchema->object)) {
            $this->result = $objectResponse;

            return;
        }

        $this->result = $this->buildObject($objectClass, $objectResponse, $actionSchema);
    }

    private function buildObject(string $objectClass, object $object, ActionSchema $actionSchema): object
    {
        /**
         * @var ReflectionClass<ObjectInterface> $reflectionClass
         */
        $reflectionClass = new ReflectionClass($objectClass);

        $reflectionProperties = $reflectionClass->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_READONLY);

        $newObject = $reflectionClass->newInstanceWithoutConstructor();

        foreach ($reflectionProperties as $reflectionProperty) {
            $value = $this->setObject($reflectionProperty, $actionSchema, $object);

            $reflectionProperty->setValue($newObject, $value);
        }

        return $newObject;
    }

    private function setObject(ReflectionProperty $reflectionProperty, ActionSchema $actionSchema, object $object)
    {
        $reflectionType = $reflectionProperty->getType();
        $name = $reflectionProperty->getName();

        if ($reflectionType instanceof ReflectionNamedType) {
            if ($name === $actionSchema->iteratorIndex && $reflectionType->getName() === 'array') {
                $list = $object->{$name};
                $value = [];

                foreach ($list as $singleObject) {
                    $value[] = $this->buildObject($actionSchema->objectIterator, $singleObject, $actionSchema);
                }

                return $value;
            }

            if (class_exists($reflectionType->getName())) {
                if (in_array(ObjectInterface::class, class_implements($reflectionType->getName()))) {
                    return $this->buildObject($reflectionType->getName(), $object->{$name}, $actionSchema);
                }
            }

            return @$object->{$reflectionProperty->name};
        }
    }
}
