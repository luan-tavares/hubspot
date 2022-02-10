<?php

namespace LTL\Hubspot\Tests\Request;

use PHPUnit\Framework\TestCase;

class CurlCallerTest extends TestCase
{
    public function testExpectHubspotExceptionIfNoExistMethod()
    {
        $errorLog = './error.log';
        $descriptorspec = [
            ['pipe', 'r'],  // stdin is a pipe that the child will read from
            ['pipe', 'w'],  // stdout is a pipe that the child will write to
            ['file', $errorLog, 'a'] // stderr is a file to write to
        ];
        proc_open('php -S localhost:8080', $descriptorspec, $pipes);
    }
}
