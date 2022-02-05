<?php

namespace LTL\Hubspot\Core\Resource\Interfaces;

use ArrayAccess;
use Countable;
use Iterator;
use LTL\Hubspot\Services\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface ResourceInterface extends PublicMethodsListableInterface, Countable, Iterator, ArrayAccess
{
    public function toArray(): array;
    public function toJson(): ?string;
    public function status(): ?int;
    public function documentation(): ?string;
}
