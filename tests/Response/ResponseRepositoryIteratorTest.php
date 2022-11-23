<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\ResponseRepositoryContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Core\Response\ResponseRepository;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class ResponseRepositoryIteratorTest extends TestCase
{
    private CurlInterface $curl;

    private ActionSchemaInterface $actionSchema;

    private array $result;

    protected function setUp(): void
    {
        $this->result = [
            'results' => [
                'a' => 4,
                'b' => 5,
                'c' => 'foo',
                'd' => ['a' => 5],
                'e' => false
            ],
            'paging' => [
                'next' => [
                    'after' => 100
                ]
            ]
        ];

        $this->curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $this->curl->method('response')->willReturn(json_encode($this->result));

        $this->actionSchema = SchemaContainer::getAction(new HubDbHubspot, 'getAll');
    }


    public function testIfIterableIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $responseRepository = ResponseRepositoryContainer::get($response);

        $responseRepository->next();

        $responseRepository->next();

        $responseRepository->rewind();
      
        $this->assertEquals(4, $responseRepository->current());
    }
}