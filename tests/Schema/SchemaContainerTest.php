<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use PHPUnit\Framework\TestCase;

class SchemaContainerTest extends TestCase
{
    public function testIfDestroyAllMethodEmptyObject()
    {
        $schemaOne = SchemaContainer::get(new CompanyHubspot);
        $schemaOne = SchemaContainer::get(new ContactHubspot);

        SchemaContainer::destroyAll();
        $this->assertEquals(SchemaContainer::count(), 0);
    }
}
