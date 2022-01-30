<?php

namespace LTL\HubspotApi\Interfaces;

use LTL\HubspotApi\Interfaces\MethodListInterface;

interface ResourceInterface extends MethodListInterface
{
    public function toArray(): ?array;
    public function toJson(): ?string;
    public function status(): ?int;
    public function documentation(): ?string;
}
