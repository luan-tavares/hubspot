<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Curl\Curl;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\BuilderInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\RequestArguments;
use LTL\Hubspot\Core\Request\RequestConnection;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    protected function setUp(): void
    {
        Hubspot::setGlobalApikey('123456');
    }

    public function testExpectHubspotExceptionIfNoExistMethod()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $method = 'unknowMethod';

        $this->expectExceptionMessage(CompanyHubspot::class ."::{$method}() not exists");
        
        $request->{$method}();
    }

    public function testCurlAddProgressIsCorrect()
    {
        /**
         * @var BuilderInterface $builder
         */
        $builder = CompanyHubspot::withProgressBar();
        
        /**
         * @var RequestInterface $request
         */
        $request = $builder->request();
        
        $this->assertEquals($request->getCurlParams(), [
            CURLOPT_NOPROGRESS => false,
            CURLOPT_PROGRESSFUNCTION => \LTL\Curl\CurlProgressBar::class .'::progress'
        ]);
    }

    public function testCurlGetResponseHeadersIsCorrect()
    {
        /**
         * @var BuilderInterface $builder
         */
        $builder = CompanyHubspot::withResponseHeaders();
        
        /**
         * @var RequestInterface $request
         */
        $request = $builder->request();
        
        $this->assertEquals($request->getCurlParams(), [
            CURLOPT_HEADER => true
        ]);
    }



    public function testRemoveOauth()
    {
        /**
         * @var BuilderInterface $builder
         */
        $builder = CompanyHubspot::oAuth('bbb')->apikey('aaa');
        
        /**
         * @var RequestInterface $request
         */
        $request = $builder->request();
     
        $this->assertEquals($request->getHeaders(), []);
    }

    public function testRemoveApikey()
    {
        /**
         * @var BuilderInterface $builder
         */
        $builder = CompanyHubspot::apikey('aaa')->oAuth('bbb');
        
        /**
         * @var RequestInterface $request
         */
        $request = $builder->request();
     
        $this->assertEquals($request->getQueries(), []);
    }

    public function testCurlCallerConnectIsCalled()
    {
        $resource = new CompanyHubspot;

        $request = RequestFactory::build($resource);

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');

        $requestArguments = new RequestArguments($actionSchema);

        $curl = $this->createMock(Curl::class);

        $curl->expects($this->once())->method('addUri');

        RequestConnection::handle($request, $requestArguments, $curl);
    }

    public function testAddUriArgumentsIsCorrect()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->removeApikey();

        $requestArgumentsMock = $this->getMockBuilder(RequestArguments::class)
            ->onlyMethods(['queriesAsParams', 'baseQuery'])
            ->disableOriginalConstructor()->getMock();
  
        $requestArgumentsMock->method('queriesAsParams')->willReturn([5]);
        $requestArgumentsMock->method('baseQuery')->willReturn([6]);

        /**
         * @var RequestArguments $requestArgumentsMock
         */
        $request->addUriArguments($requestArgumentsMock);

        $this->assertEquals($request->getQueries(), [5,6]);
    }

    public function testRemoveExceptionIsCorrect()
    {
        /**
         * @var BuilderInterface $builder
         */
        $builder = CompanyHubspot::withRequestException();

        $request = $builder->request();

        $request->removeException();

        $this->assertFalse($request->hasWithRequestException());
    }
}
