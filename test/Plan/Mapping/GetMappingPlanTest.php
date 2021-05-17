<?php

declare(strict_types=1);

namespace Test\Plan\Mapping;

use Leverage\ElasticSearch\Plan\Mapping\GetMappingPlan;
use PHPUnit\Framework\TestCase;

class GetMappingPlanTest extends TestCase
{
    private const INDEX = 'index';
    private const TYPE = 'type';

    /** @var GetMappingPlan */
    private $plan;

    public function setUp(): void
    {
        $this->plan = new GetMappingPlan(self::INDEX, self::TYPE);
    }

    public function testPrepare(): void
    {
        $EXPECTED = [
            'index' => self::INDEX,
            'type' => self::TYPE,
        ];
        $this->assertEquals($EXPECTED, $this->plan->prepare());
    }
}
