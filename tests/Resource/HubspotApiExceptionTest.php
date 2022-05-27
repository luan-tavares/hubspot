<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class HubspotApiExceptionTest extends TestCase
{
    public function testIfMessageConstructIsCorrect()
    {
        $message = Request::class .'::method() in file.php on line 10 is incorrect!';

        $expectedMessage = str_replace(Request::class .'::', ContactHubspot::class .'::', $message);

        $expectedMessage = str_replace(' in file.php on line 10', '', $expectedMessage);

        $exception = new HubspotApiException($message, ContactHubspot::class);

        $this->assertEquals($expectedMessage, $exception->getMessage());
    }

    public function testIfGetTraceInTestsIsCorrect()
    {
        try {
            (new ContactHubspot)->toArray();
        } catch (HubspotApiException $exception) {
        }

        $this->assertEquals(__FILE__, $exception->getFile());
    }

    public function testIfGetTraceLoopIsCorrectInVendorPath()
    {
        $exception = require __DIR__ .'/luan-tavares/hubspot/exception.php';

        $this->assertEquals(__FILE__, $exception->getFile());
    }

    public function testIfGetTraceLoopInVendorExamplesIsCorrect()
    {
        $exception = require __DIR__ .'/luan-tavares/hubspot/examples-hubspot-api/exception.php';

        $this->assertEquals(
            __DIR__ .'/luan-tavares/hubspot/examples-hubspot-api/exception.php',
            $exception->getFile()
        );
    }

    public function testIfToStringMagicMethodIsCorrect()
    {
        $exception = require __DIR__ .'/luan-tavares/hubspot/examples-hubspot-api/exception.php';

        $expectedMessage = '-'. HubspotApiException::class .": {$exception->getMessage()} in {$exception->getFile()} on line {$exception->getLine()}";

        $this->assertEquals(
            $expectedMessage,
            '-'. $exception
        );
    }
}
