<?php

namespace LTL\Hubspot\Core\Exceptions;

use Exception;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use Throwable;

class HubspotApiException extends Exception
{
    public function __construct($message, private ?ResourceInterface $resource = null)
    {
        parent::__construct($message);
    }


    public function __toString()
    {
        $error = $this->getTrace();
        dd($error);

        return __CLASS__ .': '. $this->message ;
    }
}
