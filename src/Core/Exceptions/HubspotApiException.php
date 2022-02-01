<?php

namespace LTL\Hubspot\Core\Exceptions;

use Exception;
use Throwable;

class HubspotApiException extends Exception
{
    public function __construct($message, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


    public function __toString()
    {
        $error = $this->getTrace()[count($this->getTrace()) - 1];

        return __CLASS__ .': '. $this->message . ' in '. $error['file'] .' on line '. $error['line'];
    }
}
