<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V2\FormHubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyBaseUriTest extends TestCase
{
    public function testIfBaseUriCastInGetContactIsCorrect()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'get');

        $this->assertEquals(
            $object->baseUri,
            'https://api.hubapi.com/crm/v3/objects/contacts/{contactIdOrEmail}'
        );
    }

    public function testIfBaseUriCastInAbsolutePathGetSubmissionFormV2IsCorrect()
    {
        $object = SchemaContainer::getAction(new FormHubspot, 'getSubmissions');

        $this->assertEquals(
            $object->baseUri,
            'https://api.hubapi.com/form-integrations/v1/submissions/forms/{formGuid}'
        );
    }
}
