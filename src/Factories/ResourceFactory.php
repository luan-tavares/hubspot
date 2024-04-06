<?php

namespace LTL\Hubspot\Factories;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Core\Schema\ActionSchema;
use ReflectionClass;

abstract class ResourceFactory
{
    /**
     * @return ResourceInterface
     */
    public static function build(
        ActionSchema $actionSchema,
        CurlInterface $curl,
        RequestInfoObject $requestInfoObject
    ): ResourceInterface {
        $response = new Response($curl, $actionSchema, $requestInfoObject);
 
        /**
         * @var ReflectionClass<ResourceInterface> $reflectionClass
         */
        $reflectionClass = SingletonContainer::get($actionSchema->resourceClass, function ($class) {
            return new ReflectionClass($class);
        });

        $newResource = $reflectionClass->newInstanceWithoutConstructor();

        $reflectionProperty = $reflectionClass->getProperty('response');
        $reflectionProperty->setValue($newResource, $response);
   
        return $newResource;
    }
}
