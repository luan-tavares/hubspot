<?php

namespace LTL\Hubspot\Core\Response\Interfaces;

use Countable;
use Iterator;
use JsonSerializable;
use LTL\Hubspot\Interfaces\ArrayableInterface;
use Override;

interface ResponseRepositoryInterface extends Iterator, Countable, JsonSerializable, ArrayableInterface
{
    public function after(): string|int|null;
    
    #[Override]
    public function current(): object|int;
}
