<?php

namespace LTL\Hubspot\Core\Helpers;

use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

abstract class GetIdFromErrorMessageHelper
{
    public static function handle(ResourceInterface $hubspotResponse): int|null
    {
        if(is_null($message = $hubspotResponse->message)) {
            return null;
        }

        preg_match('/\d+/', $message, $matches);

        if(empty($matches)) {
            return null;
        }

        return current($matches);
    }
}
