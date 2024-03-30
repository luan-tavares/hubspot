<?php

namespace LTL\Hubspot\Objects;

use LTL\Hubspot\Objects\Interfaces\ObjectInterface;

class ErrorObject implements ObjectInterface
{
    public readonly string|null $status;

    public readonly string|null $message;

    public readonly string|null $correlationId;

    public readonly string|null $category;
}