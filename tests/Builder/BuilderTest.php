<?php

namespace LTL\Hubspot\Tests\Builder;

use LTL\Hubspot\Containers\BuilderContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\HubspotApikey;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    protected function setUp(): void
    {
        BuilderContainer::destroyAll();

        HubspotApikey::clear();
    }

    public function testIfBuilderThrowExceptionCallResourceMethodBeforeRequest()
    {
        $builder = ContactHubspot::limit(10);

        $this->expectException(HubspotApiException::class);

        $builder->toArray();
    }

    public function testIfBuilderThrowExceptionCallResourceMethodBeforeRequestCorrectMessage()
    {
        $resource = new ContactHubspot;

        $builder = $resource->limit(10);

        $method = 'toArray';

        $this->expectExceptionMessage(
            $resource::class ."::{$method}() must not be used before actions:\n\n". SchemaContainer::get($resource)
        );

        $builder->$method();
    }
}
