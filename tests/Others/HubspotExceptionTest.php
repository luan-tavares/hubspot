<?php

namespace LTL\Hubspot\Tests\Others;

use LTL\Hubspot\Exceptions\HubspotApiException;
use PHPUnit\Framework\TestCase;

class HubspotExceptionTest extends TestCase
{
    public function testThrowIfMethodIsCorrect()
    {
        $this->expectException(HubspotApiException::class);

        HubspotApiException::throwIf(true, 'Exception');
    }
}
