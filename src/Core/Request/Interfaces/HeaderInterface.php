<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

interface HeaderInterface
{
    public function header(string $name, string $value): self;
    public function oAuth(string $oAuth): self;
}
