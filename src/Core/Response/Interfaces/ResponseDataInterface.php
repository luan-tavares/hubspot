<?php

namespace LTL\Hubspot\Core\Response\Interfaces;

use Countable;
use Iterator;
use JsonSerializable;
use LTL\Hubspot\Interfaces\ArrayableInterface;

interface ResponseDataInterface extends Iterator, Countable, JsonSerializable, ArrayableInterface
{
    public function getAfter(): string|int|null;
    public function getResult(): object|array|null;
    public function getRaw(): string;
}
