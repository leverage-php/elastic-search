<?php

declare(strict_types=1);

namespace Test\Plan;

use Leverage\ElasticSearch\Plan\IndexPlan;
use PHPUnit\Framework\TestCase;

class IndexPlanTest extends TestCase
{
    private const INDEX = 'index';
    private const TYPE = 'type';
    private const ID = 'id';
    private const DATA = [
        'foo' => 'bar',
    ];
    private const EXPECTED = [
        'index' => self::INDEX,
        'type' => self::TYPE,
        'id' => self::ID,
        'body' => self::DATA,
    ];

    public function testPrepare(): void
    {
        $plan = new IndexPlan(self::INDEX, self::TYPE, self::ID, self::DATA);
        $this->assertSame(self::EXPECTED, $plan->prepare());
    }
}
