<?php

namespace LTL\Hubspot\Tests\Others;

use LTL\Hubspot\Core\HubspotOAuth;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class OAuthGlobalTest extends TestCase
{
    public function testIfOauthGlobalIsCorrect()
    {
        Hubspot::setGlobalOAuth('token');

        $request = RequestFactory::build(new ContactHubspot);
        
        $this->assertEquals(['Authorization' => 'Bearer token'], $request->getHeaders());
    }

    public function testIfClearOAuthIsCorrect()
    {
        Hubspot::setGlobalOAuth('token');

        HubspotOAuth::clear();

        $request = RequestFactory::build(new ContactHubspot);
        
        $this->assertEquals([], $request->getHeaders());
    }
}