<?php

namespace LTL\Hubspot\Services\Curl;

abstract class CurlConstants
{
    public const CURL_PARAMS = [
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYPEER  => 0,
        CURLOPT_HTTPPROXYTUNNEL => false,
        CURLOPT_SSL_VERIFYHOST  => 0,
        CURLOPT_CUSTOMREQUEST   => null,
        CURLOPT_MAXREDIRS       => -1,
        CURLOPT_TIMEOUT         => 0,
        CURLOPT_FORBID_REUSE    => true,
        CURLINFO_HEADER_OUT     => false
    ];
    
    public const JSON_ENCODE = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
}
