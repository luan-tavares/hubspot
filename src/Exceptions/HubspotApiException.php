<?php

namespace LTL\Hubspot\Exceptions;

use Exception;

class HubspotApiException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    
        foreach ($this->getTrace() as $trace) {
            $file = @$trace['file'];

            if (is_null($file)) {
                continue;
            }

            if (!str_contains($file, 'luan-tavares/hubspot/') && !str_contains($file, '/app/hub_api/')) {
                $this->line = $trace['line'];
                $this->file = $trace['file'];
                break;
            }

            if (str_contains($file, '/examples/') && str_contains($file, '/app/hub_api/')) {
                $this->line = $trace['line'];
                $this->file = $trace['file'];
                break;
            }
        }
    }


    public function __toString()
    {
        return __CLASS__ .": {$this->message} in {$this->file} on line {$this->line}";
    }
}
