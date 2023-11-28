<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyParamsTest extends TestCase
{
    public function testIfParamsCastInGetAllHubDbIsCorrect()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'getAll');

        $this->assertNull($object->params);
    }

    public function testIfParamsCastInCreateAssociationIsCorrect()
    {
        $object = SchemaContainer::getAction(new AssociationHubspot, 'create');
        
        $this->assertEquals($object->params, [
            '{fromObjectType}',
            '{fromObjectId}',
            '{toObjectType}',
            '{toObjectId}'
        ]);
    }

    public function testIfParamsCastInGetCompanyWithoutBodyIsCorrect()
    {
        $object = SchemaContainer::getAction(new CompanyHubspot, 'get');

        $this->assertEquals($object->params, [
            '{companyId}'
        ]);
    }
}
