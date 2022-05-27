<?php

namespace LTL\Hubspot\Exceptions;

use Exception;

class HubspotApiException extends Exception
{
    private const APP_VENDOR_RELATIVE_DIR = '/luan-tavares/hubspot/';

    private const APP_EXAMPLES_RELATIVE_DIR = '/examples-hubspot-api/';

    public function __construct(string $message, string|null $resourceClass = null)
    {
        $this->message = $this->replaceMessageClass($message, $resourceClass);

        $root = explode('/Exceptions/', __FILE__)[0];
    
        foreach ($this->getTrace() as $trace) {
            if (!array_key_exists('file', $trace)) {
                continue;
            }

            $file = $trace['file'];

            $isNotInExampleApiPath = !str_contains($file, self::APP_EXAMPLES_RELATIVE_DIR);

            $isInVendorPath = str_contains($file, self::APP_VENDOR_RELATIVE_DIR);

            if ($isInVendorPath && $isNotInExampleApiPath) {
                continue;
            }

            if (str_contains($file, $root)) {
                continue;
            }

            $this->line = $trace['line'];
            $this->file = $trace['file'];
            break;
        }
    }



    public static function throwIf(bool $condition, string $message): void
    {
        if ($condition) {
            throw new self($message);
        }
    }

    public function __toString()
    {
        return __CLASS__ .": {$this->message} in {$this->file} on line {$this->line}";
    }

    private function replaceMessageClass(string $message, string|null $resourceClass): string
    {
        if (is_null($resourceClass)) {
            return $message;
        }

        preg_match_all('/LTL\\\Hubspot(.*?)::/', $message, $matches, PREG_PATTERN_ORDER);
        foreach ($matches[0] as $match) {
            $message = str_replace($match, $resourceClass .'::', $message);
        }
        
        preg_match_all('/\ in\ (.*?)\ on\ line\ \d*/', $message, $matches, PREG_PATTERN_ORDER);
        foreach ($matches[0] as $match) {
            $message = str_replace($match, '', $message);
        }

        return $message;
    }
}
