<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\CompanyHubspot;
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

        $this->expectException(HubspotApiException::class);
        
        $request->unknowMethod();
    }

    public function testAddOAuthToRequestByOAuth()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->addOAuthWithoutObserver('token');

      
        $this->assertEquals($request->getHeaders(), ['Authorization' => 'Bearer token']);
    }

    public function testRemoveHeaderRequestIsCorrect()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->addHeaders($this->result);

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
        $request = RequestFactory::build(new CompanyHubspot);

        $request->addBody($this->result);
        
        $this->assertEquals($request->getBody(), [
            'a' => 4,
            'b' => 5
        ]);
    }

    public function testAddQueriesToRequestIsCorrect()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->addQueries($this->result);
        
        $this->assertEquals($request->getQueries(), [
            'a' => 4,
            'b' => 5,
            'hapikey' => '123456'
        ]);
    }

    public function testRemoveQueryRequestIsCorrect()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->addQueries($this->result);

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

    public function testChangeDispatchIsTrue()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->changeDispatchToTrue();
        
        $this->assertTrue($request->hasDispatched());
    }

    public function testAddApiKey()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->addApikeyWithoutObserver('5552');
      
        $this->assertEquals($request->getQueries(), [
            'hapikey' => '5552'
        ]);
    }

    public function testAddOAuth()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->addOAuthWithoutObserver('123456789');

      
        $this->assertEquals($request->getHeaders(), [
            'Authorization' => 'Bearer 123456789'
        ]);
    }

    public function testObserverRemoveOauth()
    {
        $request = RequestFactory::build(new CompanyHubspot);

        $request->addOAuthWithoutObserver('123456789');
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
}
