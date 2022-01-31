<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

interface ResponseInterface
{
    public function getStatus(): int;
    public function get(): ?string;
    public function getAction(): ?string;
}
