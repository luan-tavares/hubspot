<?php

namespace LTL\Hubspot\Tests\BodyBuilder;

use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;
use PHPUnit\Framework\TestCase;

class SearchBuilderTest extends TestCase
{
    private array $base = [];

    protected function setUp(): void
    {
        $this->base = (new SearchBuilder)->get();
    }

    public function testIfAfterIsCorrect()
    {
        $after = 'xyz';

        $requestBody = SearchBuilder::after($after);

        $this->base['after'] = $after;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfLimitIsCorrect()
    {
        $limit = 40;

        $requestBody = SearchBuilder::limit($limit);

        $this->base['limit'] = $limit;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterEqualIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'name',
                        'operator' => 'EQ',
                        'value' => 10
                    ]
                ]
            ]
            
        ];

        $requestBody = SearchBuilder::filterEqual('name', 10);

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterHasIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'name',
                        'operator' => 'HAS_PROPERTY'
                    ]
                ]
            ]
            
        ];

        $requestBody = SearchBuilder::filterHas('name');

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfSortAscIsCorrect()
    {
        $sort = [
            [
                'propertyName' => 'name',
                'direction' => 'ASCENDING'
            ],
            [
                'propertyName' => 'name2',
                'direction' => 'ASCENDING'
            ]
        ];

        $requestBody = SearchBuilder::sortAsc('name')->sortAsc('name2');

        $this->base['sorts'] = $sort;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfPropertiesIsCorrect()
    {
        $properties = [
            'a', 'b', 'c'
        ];

        $requestBody = SearchBuilder::properties('a', 'b', 'c');

        $this->base['properties'] = $properties;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfSortDescIsCorrect()
    {
        $sort = [
            [
                'propertyName' => 'name',
                'direction' => 'DESCENDING'
            ]
        ];

        $requestBody = SearchBuilder::sortDesc('name');

        $this->base['sorts'] = $sort;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterGroupIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'id',
                        'operator' => 'HAS_PROPERTY'
                    ]
                ]
            ],
            [
                'filters' => [
                   
                    [
                        'propertyName' => 'name',
                        'operator' => 'HAS_PROPERTY'
                    ],
                    [
                        'propertyName' => 'date',
                        'operator' => 'EQ',
                        'value' => 1000
                    ]
                ]
            ],
            [
                'filters' => [
                    [
                        'propertyName' => 'name2',
                        'operator' => 'EQ',
                        'value' => 'lorem'
                    ]
                ]
            ]
        ];

        $requestBody = SearchBuilder::filterHas('id')
            ->filterGroup(function ($builder) {
                $builder->filterHas('name');
                $builder->filterEqual('date', 1000);
            })->filterGroup(function ($builder) {
                $builder->filterEqual('name2', 'lorem');
            });

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }
}
