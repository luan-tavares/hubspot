<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V1\OAuthHubspot;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use LTL\Hubspot\Resources\V3\TimelineExtensionHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyBaseHeaderTest extends TestCase
{
    public function testIfBaseHeaderCastInGetMethodIsNull()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'getAll');

        $this->assertNull($object->baseHeader);
    }

    public function testIfBaseHeaderCastInCreateHubDbHasContentTypeApplicationJson()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'create');

        $this->assertEquals(
            $object->baseHeader,
            [
                'Content-Type' =>'application/json'
            ]
        );
    }

    public function testIfBaseHeaderCastInImportToDraftHubDbHasContentTypeMultipartFormData()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'importToDraft');

        $this->assertEquals(
            $object->baseHeader,
            [
                'Content-Type' => 'multipart/form-data'
            ]
        );
    }

    public function testIfBaseHeaderCastInCreateOrRefreshOAuthHasContentTypeApplicationFormUrlEncoded()
    {
        $object = SchemaContainer::getAction(new OAuthHubspot, 'createOrRefresh');

        $this->assertEquals(
            $object->baseHeader,
            [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ]
        );
    }

    public function testIfBaseHeaderCastInExportDraftToXlsxHubDbHasAcceptVdnMsExcel()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'exportDraftToXlsx');

        $this->assertEquals(
            $object->baseHeader,
            [
                'accept' => 'application/vnd.ms-excel'
            ]
        );
    }

    public function testIfBaseHeaderCastInGetEventHtmlHeaderTimelineExtensionHasAcceptTextHtml()
    {
        $object = SchemaContainer::getAction(new TimelineExtensionHubspot, 'getEventHtmlHeader');

        $this->assertEquals(
            $object->baseHeader,
            [
                'accept' => 'text/html'
            ]
        );
    }

    public function testIfBaseHeaderCastInPostMethodPublishHubDbWithoutBodyIsNull()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'publish');

        $this->assertNull($object->baseHeader);
    }
}
