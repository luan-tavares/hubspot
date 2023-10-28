<?php

namespace LTL\Hubspot\Tests\Others;

use LTL\Hubspot\Core\Globals\OAuthGlobal;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class HubspotExceptionTest extends TestCase
{
    public function testThrowIfMethodIsCorrect()
    {
        $this->expectException(HubspotApiException::class);

        HubspotApiException::throwIf(true, 'Exception');
    }
}
