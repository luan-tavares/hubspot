<?php

namespace LTL\Hubspot\Core\Helpers;

use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

abstract class GetIdFromErrorMessageHelper
{
    public static function handle(ResourceInterface $hubspotResponse): int|null
    {
        if (is_null($message = $hubspotResponse->message)) {
            return null;
        }

        preg_match('/Existing ID:\s*(\d+)/', $message, $matches);

        if (empty($matches)) {
            return null;
        }

        return $matches[1];
    }
}
