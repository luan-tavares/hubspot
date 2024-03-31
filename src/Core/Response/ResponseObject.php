<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Response\AfterResponse;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Objects\ErrorObject;
use LTL\Hubspot\Objects\Interfaces\ObjectInterface;
use ReflectionClass;
use ReflectionProperty;
use TypeError;

class ResponseObject
{
    public readonly object|array|null $result;

    public readonly string|int|null $after;

    public function __construct(
        ActionSchemaInterface $actionSchema,
        CurlInterface $curl,
        RequestInfoObject $requestInfoObject
    ) {
        $raw = $curl->response();
        
        $objectResponse = json_decode($raw);

        $this->after = AfterResponse::get($actionSchema, $objectResponse);
       
        $data = $this->getResultData($actionSchema, $objectResponse);
    

        /**Delete or plain text 404 error */
        if(is_null($data)) {
            $this->result = $data;
            
            return;
        }

        if(is_null($objectClass = $this->getResolveObject($curl, $requestInfoObject, $actionSchema))) {
            $this->result = $data;
            
            return;
        }

        /**
         * @var ReflectionClass<ObjectInterface> $reflectionClass
         */
        $reflectionClass = new ReflectionClass($objectClass);

        $reflectionProperties = $reflectionClass->getProperties(ReflectionProperty::IS_PUBLIC|ReflectionProperty::IS_READONLY);

        if(!is_array($data)) {
            $this->result = $this->setProperties($reflectionClass, $reflectionProperties, $objectResponse);
            
            return;
        }

        $this->result = array_map(function (object $objectResponse) use ($reflectionClass, $reflectionProperties) {
            return $this->setProperties($reflectionClass, $reflectionProperties, $objectResponse);
        }, $data);
    }

    /**
     * @param ReflectionClass<ObjectInterface> $reflectionClass
     * @param array<ReflectionProperty> $reflectionProperties
     */
    private function setProperties(
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

    private function getResolveObject(
        CurlInterface $curl,
        RequestInfoObject $requestInfoObject,
        ActionSchemaInterface $actionSchema
    ): string|null {
        $hasError = $curl->error();

        $withObject = $requestInfoObject->hasObject;

        if(!$withObject) {
            return null;
        }

        if($hasError) {
            return ErrorObject::class;
        }

        if(is_null($objectClass = $actionSchema->object)) {
            return null;
        }
       
        return $objectClass;
    }

    private function getResultData(
        ActionSchemaInterface $actionSchema,
        object|array|null $objectResponse
    ): array|object|null {
        if (is_array($objectResponse)) {
            return $objectResponse;
        }

        if(is_null($objectResponse)) {
            return null;
        }

        if(is_null($iteratorIndex = $actionSchema->iteratorIndex)) {
            return $objectResponse;
        }

        return $objectResponse->{$iteratorIndex};
    }
}
