<?php

namespace LTL\Hubspot\Core\BodyBuilder\CrmCreateOrUpdateBuilder;

use LTL\Hubspot\Core\BodyBuilder\ActionsBuilder;
use LTL\Hubspot\Core\BodyBuilder\Interfaces\CrmCreateOrUpdateBuilderInterface;
use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;

class CrmCreateOrUpdateActionsBuilder extends ActionsBuilder implements CrmCreateOrUpdateBuilderInterface
{
    public function properties(array $properties): SearchBuilder
    {
        return $this->bodyBuilder->add('properties', $properties);
    }
}