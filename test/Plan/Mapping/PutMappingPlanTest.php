<?php

declare(strict_types=1);

namespace Test\Plan\Mapping;

use Leverage\ElasticSearch\Interfaces\MappingTypeInterface;
use Leverage\ElasticSearch\Plan\Mapping\PutMappingPlan;
use PHPUnit\Framework\TestCase;

class PutMappingPlanTest extends TestCase
{
    private const FIELD = 'field';
    private const INDEX = 'index';
    private const TYPE = 'type';

    /** @var PutMappingPlan */
    private $plan;

    public function setUp(): void
    {
        $this->plan = new PutMappingPlan(self::INDEX, self::TYPE);
    }

    public function testPrepare(): void
    {
        $mapping = $this->createMock(MappingTypeInterface::class);
        $mapping->method('getField')->willReturn(self::FIELD);
        $this->plan->addMapping($mapping);

        $EXPECTED = [
            'index' => self::INDEX,
            'type' => self::TYPE,
            'body' => [
                'properties' => [
                    self::FIELD => $mapping,
                ],
            ]
        ];

        $this->assertEquals($EXPECTED, $this->plan->prepare());
    }
}
