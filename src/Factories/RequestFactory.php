<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\HubspotApikey;
use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Request\Components\BodyRequestComponent;
use LTL\Hubspot\Core\Request\Components\CurlRequestComponent;
use LTL\Hubspot\Core\Request\Components\HeaderRequestComponent;
use LTL\Hubspot\Core\Request\Components\MethodRequestComponent;
use LTL\Hubspot\Core\Request\Components\QueryRequestComponent;
use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Request\Observers\ComponentObserver;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Interfaces\FactoryInterface;
use ReflectionClass;

abstract class RequestFactory implements FactoryInterface
{
    private const COMPONENTS = [
        'query' => QueryRequestComponent::class,
        'header' => HeaderRequestComponent::class,
        'body' => BodyRequestComponent::class,
        'curl' => CurlRequestComponent::class,
        'uri' => UriRequestComponent::class,
        'method' => MethodRequestComponent::class
    ];

    public static function build(ResourceInterface $baseResource): RequestInterface
    {
        $reflectionClass = SingletonContainer::get(Request::class, function ($class) {
            return new ReflectionClass($class);
        });

        return self::makeRequest($reflectionClass, $baseResource);
    }

    private static function makeRequest(ReflectionClass $reflectionClass, ResourceInterface $baseResource): RequestInterface
    {
        $request = $reflectionClass->newInstanceWithoutConstructor();

        $reflectionProperty = $reflectionClass->getProperty('resource');
        $reflectionProperty->setValue($request, $baseResource);
        
        foreach (self::COMPONENTS as $property => $componentClass) {
            $reflectionProperty = $reflectionClass->getProperty($property);
            $reflectionProperty->setValue($request, self::instanciateComponent($componentClass, $request));
        }

        return $request;
    }

    private static function instanciateComponent(string $componentClass, RequestInterface $request): ComponentInterface
    {
        $reflectionClass = SingletonContainer::get($componentClass, function ($class) {
            return new ReflectionClass($class);
        });

        $component = $reflectionClass->newInstance($request);
       
        $component->attach(SingletonContainer::get(ComponentObserver::class));

        return $component;
    }
}
