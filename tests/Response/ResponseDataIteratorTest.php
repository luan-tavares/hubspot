<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class ResponseDataIteratorTest extends TestCase
{
    private CurlInterface $curl;

    private ActionSchema $actionSchema;

    private RequestInfoObject $requestInfoObject;

    private array $result;

    protected function setUp(): void
    {
        $this->result = [
            'results' => [
                [
                    'typeId' => 5,
                    'label' => 'test_label',
                    'category' => 'HUBSPOT_DEFINED'
                ],
                [
                    'typeId' => 5,
                    'label' => 'test_label',
                    'category' => 'HUBSPOT_DEFINED'
                ]
            ]
        ];

        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->result));

        $this->curl = $curl;

        $this->actionSchema = SchemaContainer::getAction(new AssociationHubspot, 'getDefinition');

        $this->requestInfoObject = new RequestInfoObject([
            'hasObject' => false
        ]);
    }


    public function testIfIterableIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        $response->next();

        $response->rewind();
 
        $this->assertEquals((object) [
            'typeId' => 5,
            'label' => 'test_label',
            'category' => 'HUBSPOT_DEFINED'
        ], $response->current());
    }
}
