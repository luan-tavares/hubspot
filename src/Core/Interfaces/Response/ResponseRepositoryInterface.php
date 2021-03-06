<?php

namespace LTL\Hubspot\Core\Interfaces\Response;

use Countable;
use Iterator;
use JsonSerializable;
use LTL\Hubspot\Interfaces\ArrayableInterface;

interface ResponseRepositoryInterface extends Iterator, Countable, JsonSerializable, ArrayableInterface
{
    public function after(): string|int|null;
}
