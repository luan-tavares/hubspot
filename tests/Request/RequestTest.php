<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Containers\ApikeyContainer;
use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Core\Resource\Resource;
use LTL\Hubspot\Exceptions\HubspotApiException;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    protected $object;

    private $items;

    protected function setUp(): void
    {
        $stub = $this->getMockBuilder(Resource::class)->disableOriginalConstructor()->getMock();

        ApikeyContainer::store('123456');

        $this->object = RequestContainer::get($stub);

        $this->items = [
            'a' => 4,
            'b' => 5,
            'c' => null
        ];
    }

    public function testExpectHubspotExceptionIfNoExistMethod()
    {
        $this->expectException(HubspotApiException::class);
        
        $this->object->noExistsMethod();
    }

    public function testAddOAuthToRequestByOAuth()
    {
        $this->object->oAuth('token');
      
        $this->assertEquals($this->object->getHeaders(), ['Authorization' => 'Bearer token']);
    }

    public function testRemoveHeaderRequestIsCorrect()
    {
        $this->object->addHeaders($this->items);

        $this->object->removeHeader('a');
      
        $this->assertEquals($this->object->getHeaders(), ['b' => 5]);
    }

    public function testObserverRemoveApikeyIfOAuthAdded()
    {
        $this->object->oAuth('token');

        $this->assertArrayNotHasKey('hapikey', $this->object->getQueries(), 'With Header "oAuth", the Request Query must not have "hapikey"');
    }

    public function testAddBodyToRequestIsCorrect()
    {
        $this->object->addBody($this->items);
        
        $this->assertEquals($this->object->getBody(), [
            'a' => 4,
            'b' => 5
        ]);
    }

    public function testAddQueriesToRequestIsCorrect()
    {
        $this->object->addQueries($this->items);
        
        $this->assertEquals($this->object->getQueries(), [
            'a' => 4,
            'b' => 5,
            'hapikey' => '123456'
        ]);
    }

    public function testRemoveQueryRequestIsCorrect()
    {
        $this->object->addQueries($this->items);

        $this->object->removeQuery('a');
      
        $this->assertEquals($this->object->getQueries(), [
            'b' => 5,
            'hapikey' => '123456'
        ]);
    }


    public function testCurlAddProgressIsCorrect()
    {
        $this->object->withProgressBar();
        
        $this->assertEquals($this->object->getCurlParams(), [
            CURLOPT_NOPROGRESS => false,
            CURLOPT_PROGRESSFUNCTION => \LTL\Curl\CurlProgressBar::class .'::progress'
        ]);
    }

    public function testCurlGetResponseHeadersIsCorrect()
    {
        $this->object->withResponseHeaders();
        
        $this->assertEquals($this->object->getCurlParams(), [
            CURLOPT_HEADER => true
        ]);
    }

    public function testChangeDispatchIsTrue()
    {
        $this->object->changeDispatchToTrue();
        
        $this->assertTrue($this->object->hasDispatched());
    }

    public function testAddApiKey()
    {
        $this->object->addApikeyWithoutObserver('5552');
      
        $this->assertEquals($this->object->getQueries(), [
            'hapikey' => '5552'
        ]);
    }

    public function testAddOAuth()
    {
        $this->object->addOAuthWithoutObserver('123456789');

      
        $this->assertEquals($this->object->getHeaders(), [
            'Authorization' => 'Bearer 123456789'
        ]);
    }

    public function testObserverRemoveOauth()
    {
        $this->object->addOAuthWithoutObserver('123456789');
        $this->object->apikey('5552');
     
        $this->assertEquals($this->object->getHeaders(), []);
    }

    public function testObserverRemoveApikey()
    {
        $this->object->apikey('5552');
        $this->object->oAuth('123456789');
     
        $this->assertEquals($this->object->getQueries(), []);
    }
}
