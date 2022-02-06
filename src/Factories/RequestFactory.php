<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\ObserverContainer;
use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Request\Components\BodyRequestComponent;
use LTL\Hubspot\Core\Request\Components\CurlRequestComponent;
use LTL\Hubspot\Core\Request\Components\HeaderRequestComponent;
use LTL\Hubspot\Core\Request\Components\QueryRequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\Observers\ComponentObserver;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Factories\Interfaces\FactoryInterface;
use ReflectionClass;

abstract class RequestFactory implements FactoryInterface
{
    private const COMPONENTS = [
        'query' => QueryRequestComponent::class,
        'header' => HeaderRequestComponent::class,
        'body' => BodyRequestComponent::class,
        'curl' => CurlRequestComponent::class,
    ];

    public static function build(ResourceInterface $resource): RequestInterface
    {
        $reflectionClass = SingletonContainer::get(Request::class, function ($class) {
            return new ReflectionClass($class);
        });
   
        return self::makeRequest($reflectionClass, $resource);
    }

    private static function makeRequest(ReflectionClass $reflectionClass, ResourceInterface $resource): RequestInterface
    {
        $request = $reflectionClass->newInstanceWithoutConstructor();

        $reflectionProperty = $reflectionClass->getProperty('resource');
        $reflectionProperty->setValue($request, $resource);
        
        foreach (self::COMPONENTS as $property => $componentClass) {
            $reflectionProperty = $reflectionClass->getProperty($property);
            $reflectionProperty->setValue($request, self::instanciateComponent($componentClass, $resource));
        }

        return $request;
    }

    private static function instanciateComponent(string $componentClass, ResourceInterface $resource): ComponentInterface
    {
        $component = new $componentClass($resource);
       
        $component->attach(ObserverContainer::get(ComponentObserver::class));

        return $component;
    }
}
