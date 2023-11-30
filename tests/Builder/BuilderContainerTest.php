<?php

namespace LTL\Hubspot\Tests\Builder;

use LTL\Hubspot\Containers\BuilderContainer;
use LTL\Hubspot\Core\Globals\ApikeyGlobal;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Factories\BuilderFactory;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class BuilderContainerTest extends TestCase
{
    protected function setUp(): void
    {
        BuilderContainer::destroyAll();

        ApikeyGlobal::clear();
    }

    public function testIfBuilderCountMethodIsCorrect()
    {
        $builder = ContactHubspot::limit(10);
        $builder = CompanyHubspot::offset(0);
        $builder2 = (new ContactHubspot)->withProperties('a', 'b');
        $builder2 = (new CompanyHubspot)->withProperties('a', 'b');

        $this->assertEquals(BuilderContainer::count(), 4);
    }

    public function testIfBuilderDestroyMethodIsCorrect()
    {
        $builder = ContactHubspot::limit(10);
        $builder = CompanyHubspot::offset(0);
        $builder2 = (new ContactHubspot)->withProperties('a', 'b');
        $builder2 = (new CompanyHubspot)->withProperties('a', 'b');

        BuilderContainer::destroyAll();
        $this->assertEquals(BuilderContainer::count(), 0);
    }

    public function testIfBuilderDestroyAllMethodIsCorrect()
    {
        $builder = ContactHubspot::limit(10);
        $builder = CompanyHubspot::offset(0);
        $builder2 = (new ContactHubspot)->withProperties('a', 'b');
        $builder2 = (new CompanyHubspot)->withProperties('a', 'b');

        BuilderContainer::destroyAll();
        $this->assertEquals(BuilderContainer::count(), 0);
    }

    public function testIfBuilderAutoDestroyCorrect()
    {
        $resource = new ContactHubspot;
        $builder = ContactHubspot::limit(10);
        $builder = $resource->limit(10);
        $builder = $resource->offset(0);
        $this->assertEquals(BuilderContainer::count(), 2);
    }

    public function testIfLimitBuilderContainerIsCorrect()
    {
        $a = 0;
       
        while ($a < 50) {
            CompanyHubspot::limit(10);
            $a++;
        }
       
        $this->assertEquals(BuilderContainer::count(), 5);
    }

    public function testIfBuilderContainerNotLeakMemory()
    {
        $a = $memory = 0;
        while ($a < 200) {
            CompanyHubspot::limit(10);
            $a++;
            $memoryDiff = memory_get_peak_usage() - $memory;
            $memory = memory_get_peak_usage();
        }

        $this->assertEquals($memoryDiff, 0);
    }

    public function testIfBuilderContainerDestroyAbstractRequestComponents()
    {
        $request = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();

        $request->method('destroyComponents');

        $request->expects($this->once())
            ->method('destroyComponents');

        /**
         * @var RequestInterface $request
         */
        BuilderFactory::build(new AssociationHubspot, $request);
    }

    public function testIfBuilderContainerDestroyMethodRemoveBuilderPointer()
    {
        $resource = new ContactHubspot;

        $builderOne = BuilderContainer::get($resource);
        $builderTwo = CompanyHubspot::limit(10);

        BuilderContainer::destroy($resource);

        $this->assertEquals(1, BuilderContainer::count());
    }
}
