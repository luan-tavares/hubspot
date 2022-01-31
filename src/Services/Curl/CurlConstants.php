<?php

namespace LTL\Hubspot\Services\Curl;

abstract class CurlConstants
{
    public const CURL_PARAMS = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_HTTPHEADER     => null,
        CURLOPT_CUSTOMREQUEST  => null,
        CURLOPT_MAXREDIRS => -1,
        CURLOPT_POSTFIELDS     => null,
        CURLOPT_TIMEOUT => 0,
    ];
    
    public const JSON_ENCODE = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
}
