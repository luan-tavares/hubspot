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

    public function testIfFilterNotHasIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'name',
                        'operator' => 'NOT_HAS_PROPERTY'
                    ]
                ]
            ]
            
        ];

        $requestBody = SearchBuilder::filterNotHas('name');

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

    public function testIfFilterLessIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'LT',
                        'value' => 1000
                    ]
                ]
            ]
        ];

        $requestBody = SearchBuilder::filterLess('number', 1000);

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterGreaterIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'GT',
                        'value' => 1000
                    ]
                ]
            ]
        ];

        $requestBody = SearchBuilder::filterGreater('number', 1000);

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterGreaterOrEqualIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'GTE',
                        'value' => 1000
                    ]
                ]
            ]
        ];

        $requestBody = SearchBuilder::filterGreaterOrEqual('number', 1000);

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterLessOrEqualIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'LTE',
                        'value' => 1000
                    ]
                ]
            ]
        ];

        $requestBody = SearchBuilder::filterLessOrEqual('number', 1000);

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterNotEqualIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'property',
                        'operator' => 'NEQ',
                        'value' => 'value'
                    ]
                ]
            ]
        ];

        $requestBody = SearchBuilder::filterNotEqual('property', 'value');

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterBetweenIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'BETWEEN',
                        'value' => 1000,
                        'highValue' => 2000
                    ]
                ]
            ]
        ];

        $requestBody = SearchBuilder::filterBetween('number', 1000, 2000);

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterInIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'IN',
                        'values' => [1,2,3]
                    ]
                ]
            ]
        ];

        $requestBody = SearchBuilder::filterIn('number', [1,2,3]);

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterNotInIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'NOT_IN',
                        'values' => [1,2,3]
                    ]
                ]
            ]
        ];

        $requestBody = SearchBuilder::filterNotIn('number', [1,2,3]);

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterContainsIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'property',
                        'operator' => 'CONTAINS_TOKEN',
                        'value' => '*@teste'
                    ]
                ]
            ]
        ];

        $requestBody = SearchBuilder::filterContains('property', '*@teste');

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }

    public function testIfFilterNotContainsIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'property',
                        'operator' => 'NOT_CONTAINS_TOKEN',
                        'value' => '*@teste'
                    ]
                ]
            ]
        ];

        $requestBody = SearchBuilder::filterNotContains('property', '*@teste');

        $this->base['filterGroups'] = $filter;

        $this->assertEquals($this->base, $requestBody->get());
    }
}