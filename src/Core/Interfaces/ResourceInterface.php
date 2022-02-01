<?php

namespace LTL\Hubspot\Core\Interfaces;

use LTL\Hubspot\Core\Interfaces\MethodListInterface;

interface ResourceInterface extends MethodListInterface
{
    public function toArray(): ?array;
    public function toJson(): ?string;
    public function status(): ?int;
    public function documentation(): ?string;
}
