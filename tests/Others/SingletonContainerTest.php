<?php

namespace LTL\Hubspot\Tests\Others;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class SingletonContainerTest extends TestCase
{
    protected function setUp(): void
    {
        SingletonContainer::destroyAll();
    }

    public function testIfSingletonCreateClass()
    {
        $object = SingletonContainer::get(ContactHubspot::class);
        
        $this->assertInstanceOf(ContactHubspot::class, $object);
    }

    public function testIfSingletonCallbackCreateClass()
    {
        $object = SingletonContainer::get(ContactHubspot::class, function ($class) {
            return new ReflectionClass($class);
        });
        
        $this->assertInstanceOf(ReflectionClass::class, $object);
    }

    public function testIfSingletonCountIsCorrect()
    {
        $object = SingletonContainer::get(ContactHubspot::class, function ($class) {
            return new ReflectionClass($class);
        });

        $object2 = SingletonContainer::get(CompanyHubspot::class);

        $object3 = SingletonContainer::get(CompanyHubspot::class);
        
        $this->assertEquals(2, SingletonContainer::count());
    }
}
