<?php

namespace LTL\Hubspot\Core\Response;

class RequestInfoObject
{
    public readonly bool $hasObject;

    public function __construct(array $responseRequestData)
    {
        $this->hasObject = $responseRequestData['hasObject'];
    }
}
