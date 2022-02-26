<?php

namespace LTL\Hubspot\Exceptions;

use Exception;

class HubspotApiException extends Exception
{
    public function __construct(string $message, string|null $resourceClass = null)
    {
        $this->message = $this->replaceMessageClass($message, $resourceClass);
    
        parent::__construct($this->message);
    
        foreach ($this->getTrace() as $trace) {
            $file = @$trace['file'];

            if (is_null($file)) {
                continue;
            }

            if (!str_contains($file, 'luan-tavares/hubspot/') && !str_contains($file, '/luan/app/')) {
                $this->line = $trace['line'];
                $this->file = $trace['file'];
                break;
            }

            if (str_contains($file, '/examples/') && str_contains($file, '/luan/app/')) {
                $this->line = $trace['line'];
                $this->file = $trace['file'];
                break;
            }
        }
    }

    public static function throwExceptionIf(bool $condition, string $message): void
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
