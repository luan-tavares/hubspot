<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

interface RequestArgumentsInterface
{
    public function body(): array|null;
    public function params(): array|null;
    public function queriesAsParams(): array|null;
    public function baseUri(): string;
    public function notHasAuthentication(): bool;
    public function baseQuery(): array|null;
    public function getMethod(): string;
    public function baseHeader(): array|null;
}
