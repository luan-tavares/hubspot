<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\BuilderContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Globals\ApikeyGlobal;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Factories\ResponseRepositoryFactory;
use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V3\DealHubspot;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class ResourceTest extends TestCase
{
    private ResponseInterface|null $response;

    private ResourceInterface $baseResource;

    private array $result;

    protected function setUp(): void
    {
        $this->result = [
            'results' => [
                'a' => 4,
                'd' => ['a' => 5],
            ],
            'paging' => [
                'next' => [
                    'after' => 100
                ]
            ]
        ];

        $this->response = null;

        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(202);
        $curl->method('response')->willReturn(json_encode($this->result));
        $curl->method('uri')
            ->willReturn('https://test.com/api?hapikey=12345678-1234-1234-1234-abcde1234567');
        $curl->method('headers')->willReturn(['Content-Type' => 'application/json;charset=utf-8']);

        $this->baseResource = new AssociationHubspot;
        $actionSchema = SchemaContainer::getAction($this->baseResource, 'getDefinition');

        /**
         * @var CurlInterface $curl
         */
        $this->response = new Response($curl, $actionSchema);
    }


    public function testIfGetMagicMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->results->a, 4);
    }

    public function testSetGlobalApikeyMethodIsCorrect()
    {
        Hubspot::setGlobalApikey('123456');
      
        $this->assertEquals(ApikeyGlobal::get(), '123456');
    }

    public function testIfCallMagicMethodIsCorrect()
    {
        $builder = (new ContactHubspot)->limit(55);
      
        $this->assertEquals($builder->request()->getQueries(), [
            'hapikey' => '123456',
            'limit' => 55
        ]);
    }

    public function testIfCallStaticMagicMethodIsCorrect()
    {
        $builder = ContactHubspot::withProperties('a', 'b', 'c');
      
        $this->assertEquals($builder->request()->getQueries(), [
            'hapikey' => '123456',
            'property' => ['a', 'b', 'c']
        ]);
    }

    public function testIfToStringMagicMethodIsCorrect()
    {
        $builder = (new DealHubspot)->properties('a,b,c');
   
        $this->assertEquals((string) $builder->baseResource(), 'deals-v3');
    }

    public function testIfCallToArrayBeforeRequestCallThrowsException()
    {
        $this->expectExceptionMessage(get_class($this->baseResource) ."::toArray() must not be used before actions:\n\n". SchemaContainer::get($this->baseResource));
      
        $this->baseResource->toArray();
    }

    public function testIfGetMagicMethodBeforeRequestThrowsException()
    {
        $this->expectExceptionMessage(
            "Property access must not be used before actions:\n\n". SchemaContainer::get($this->baseResource)
        );
      
        $this->baseResource->unknow;
    }

    public function testIfTypeArgumentErrorThrowHubspotApiException()
    {
        $this->expectException(HubspotApiException::class);
      
        CompanyHubspot::after([]);
    }

    public function testIfInitWorks()
    {
        $expected = ['limit' => 50];
        $resource = new class extends ContactHubspot {
            protected function init()
            {
                $this->limit(50);
            }
        };

        $builder = BuilderContainer::get($resource);

        $request = $builder->request();

        $request->removeApikey();
      
        $this->assertEquals($expected, $request->getQueries());
    }

    public function testIfCallGlobalMethodsWrongArgumentsThrowException()
    {
        $this->expectException(HubspotApiException::class);

        Hubspot::setGlobalApikey(null, 5);
    }

    public function testIfCallUnknowMethodsInAbstractClassThrowException()
    {
        $this->expectException(HubspotApiException::class);

        Hubspot::aaa();
    }

    public function testIfEmptyCountableIsCorrect()
    {
        $curlResponse = [
            'results' => []
        ];
        
        $baseResource = new ContactHubspot;

        $curlMock = $this->getMockBuilder(Curl::class)->getMock();
        $curlMock->method('response')->willReturn(json_encode($curlResponse));

        /**
         * @var CurlInterface $curlMock
         */
        $response = new Response($curlMock, SchemaContainer::getAction($baseResource, 'getAll'));
        $resource = ResourceFactory::build($baseResource, $response);

        $this->assertTrue($resource->empty());
    }
}
