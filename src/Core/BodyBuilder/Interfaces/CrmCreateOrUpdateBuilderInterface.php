<?php

namespace LTL\Hubspot\Core\BodyBuilder\Interfaces;

use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;

interface CrmCreateOrUpdateBuilderInterface
{
    public function properties(array $properties): SearchBuilder;
}