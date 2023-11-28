<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Curl\Curl;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Request\RequestArguments;
use LTL\Hubspot\Core\Request\RequestDefinition;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V3\EngagementEmailHubspot;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    private array $items;

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

    public function testRemoveHeaderRequestIsCorrect()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->addHeadersBefore($this->result);

        $request->removeHeader('a');
      
        $this->assertEquals($request->getHeaders(), ['b' => 5]);
    }

    public function testObserverRemoveApikeyIfOAuthAdded()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->oAuth('token');

        $this->assertArrayNotHasKey('hapikey', $request->getQueries(), 'With Header "oAuth", the Request Query must not have "hapikey"');
    }

    public function testAddBodyToRequestIsCorrect()
    {
        $resource = new CompanyHubspot;

        $request = RequestFactory::build($resource);

        $actionSchema = SchemaContainer::getAction($resource, 'update');

        $requestArguments = new RequestArguments($actionSchema, ['123', $this->result]);

        $request->addBody($requestArguments);
        
        $this->assertEquals($request->getBody(), [
            'a' => 4,
            'b' => 5
        ]);
    }

    public function testAddMethodToRequestIsCorrect()
    {
        $resource = new CompanyHubspot;

        $request = RequestFactory::build($resource);

        $method = 'GET';

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');

        $request->addMethod($actionSchema);
        
        $this->assertEquals($method, $request->getMethod());
    }

    public function testAddQueriesIsCorrect()
    {
        $resourceBuilder = EngagementEmailHubspot::limit(10);

        $request = $resourceBuilder->request();

        $request->addQueriesAfter([
            'limit' => 20,
            'nullable' => null
        ]);
        
        $this->assertEquals($request->getQueries(), [
            'limit' => 20,
            'hapikey' => '123456'
        ]);
    }

    public function testAddQueriesBeforeIsCorrect()
    {
        $resourceBuilder = EngagementEmailHubspot::limit(10);

        $request = $resourceBuilder->request();

        $request->addQueriesBefore([
            'limit' => 20,
            'nullable' => null
        ]);
        
        $this->assertEquals($request->getQueries(), [
            'limit' => 10,
            'hapikey' => '123456'
        ]);
    }

    public function testRemoveQueryRequestIsCorrect()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->addQueriesAfter($this->result);

        $request->removeQuery('a');
      
        $this->assertEquals($request->getQueries(), [
            'b' => 5,
            'hapikey' => '123456'
        ]);
    }


    public function testCurlAddProgressIsCorrect()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->withProgressBar();
        
        $this->assertEquals($request->getCurlParams(), [
            CURLOPT_NOPROGRESS => false,
            CURLOPT_PROGRESSFUNCTION => \LTL\Curl\CurlProgressBar::class .'::progress'
        ]);
    }

    public function testCurlGetResponseHeadersIsCorrect()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->withResponseHeaders();
        
        $this->assertEquals($request->getCurlParams(), [
            CURLOPT_HEADER => true
        ]);
    }



    public function testObserverRemoveOauth()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->oAuth('123456789');
        $request->apikey('5552');
     
        $this->assertEquals($request->getHeaders(), []);
    }

    public function testObserverRemoveApikey()
    {
        $request = RequestFactory::build(new CompanyHubspot);
        
        $request->apikey('5552');
        $request->oAuth('123456789');
     
        $this->assertEquals($request->getQueries(), []);
    }

    public function testCurlCallerConnectIsCalled()
    {
        $resource = new CompanyHubspot;

        $request = RequestFactory::build($resource);

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');

        $requestDefinition = new RequestDefinition($request, $actionSchema, []);


        $curl = $this->createMock(Curl::class);


        $curl->expects($this->once())->method('addUri');

        $requestDefinition->connect($curl);
    }
}
