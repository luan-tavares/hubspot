<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Curl\Curl;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\BuilderInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Request\RequestArguments;
use LTL\Hubspot\Core\Request\RequestConnection;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V3\EngagementEmailHubspot;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{

    private array $result;

    protected function setUp(): void
    {
        Hubspot::setGlobalApikey('123456');

        $this->result = [
            'a' => 4,
            'b' => 5,
            'c' => null
        ];
    }

    public function testExpectHubspotExceptionIfNoExistMethod()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $method = 'unknowMethod';

        $this->expectExceptionMessage(CompanyHubspot::class ."::{$method}() not exists");
        
        $request->$method();
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
}
