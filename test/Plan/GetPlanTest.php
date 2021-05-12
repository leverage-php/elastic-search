<?php

declare(strict_types=1);

namespace Test\Plan;

use Leverage\ElasticSearch\Plan\GetPlan;
use PHPUnit\Framework\TestCase;

class GetPlanTest extends TestCase
{
    private const INDEX = 'index';
    private const TYPE = 'type';
    private const ID = 'id';
    private const EXPECTED = [
        'index' => self::INDEX,
        'type' => self::TYPE,
        'id' => self::ID,
    ];

    public function testPrepare(): void
    {
        $plan = new GetPlan(self::INDEX, self::TYPE, self::ID);
        $this->assertSame(self::EXPECTED, $plan->prepare());
    }
}
