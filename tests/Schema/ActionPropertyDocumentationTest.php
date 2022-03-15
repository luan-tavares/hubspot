<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V1\PropertyDealHubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyDocumentationTest extends TestCase
{
    public function testIfDocumentationCastInPropertyV2GetByMethodIsCorrect()
    {
        $object = SchemaContainer::getAction(new PropertyDealHubspot, 'get');

        $this->assertEquals(
            $object->documentation,
            'https://legacydocs.hubspot.com/docs/methods/deals/get_deal_property'
        );
    }

    public function testIfDocumentationCastInContactGetGeneralIsCorrect()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'get');

        $this->assertEquals(
            $object->documentation,
            'https://developers.hubspot.com/docs/api/crm/contacts'
        );
    }
}
