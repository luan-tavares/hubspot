<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Core\Request\RequestArguments;

interface RequestConnectionInterface
{
    public function connect(CurlInterface|null $curl = null): CurlInterface;
    public static function handle(RequestInterface $request, RequestArguments $requestArguments): CurlInterface;
}
