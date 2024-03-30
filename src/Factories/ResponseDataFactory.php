<?php

namespace LTL\Hubspot\Factories;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Response\Interfaces\ResponseDataInterface;
use LTL\Hubspot\Core\Response\ResponseData;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use ReflectionClass;

abstract class ResponseDataFactory
{
    public static function build(ActionSchemaInterface $actionSchema, CurlInterface $curl): ResponseDataInterface
    {
        $reflectionClass = SingletonContainer::get(ResponseData::class, function ($class) {
            return new ReflectionClass($class);
        });

        $responseData = $reflectionClass->newInstanceWithoutConstructor();
        
        $rawResponse = $curl->response();
        $data = json_decode($rawResponse);

        $hasError = $curl->error();

        $reflectionProperty = $reflectionClass->getProperty('result');
        $reflectionProperty->setValue($responseData, ObjectFactory::build($data, $actionSchema, $hasError));

        $reflectionProperty = $reflectionClass->getProperty('raw');
        $reflectionProperty->setValue($responseData, $rawResponse);

        $reflectionProperty = $reflectionClass->getProperty('after');
        $reflectionProperty->setValue($responseData, self::setAfter($actionSchema, $data));

        return $responseData;
    }


    private static function setAfter(ActionSchemaInterface $actionSchema, object|array|null $data): int|string|null
    {
        if (is_null($actionSchema->afterIndex)) {
            return null;
        }
        
        $mapList = explode('.', $actionSchema->afterIndex);
  
        $after = $data;
       
        foreach ($mapList as $current) {

            if (!isset($after->{$current})) {
                return null;
            }
            $after = @$after->{$current};
        }


       
        return $after;
    }
}
