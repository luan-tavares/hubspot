<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use ReflectionException;
use ReflectionProperty;

class RequestInfoObject
{
    public readonly bool $hasObject;

    public readonly bool $hasErrorIfPropertyNotExists;

    public readonly string|null $propertyClass;

    public readonly int $tryCount;

    public function __construct(array $responseRequestData, ResourceInterface $resource, int $tryCount = 0)
    {

        $this->hasObject = $responseRequestData['hasObject'];

        $this->tryCount = $tryCount;

        $this->hasErrorIfPropertyNotExists = $responseRequestData['errorIfPropertyExists'];

        try {
            $reflectionProperty = new ReflectionProperty($resource, 'properties');

            $type = $reflectionProperty->getType();

            $this->propertyClass = $type->getName();
        } catch (ReflectionException) {
            $this->propertyClass = null;

            return;
        }
    }
}
