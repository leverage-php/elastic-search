<?php

declare(strict_types=1);

namespace Test\Plan\Index;

use Leverage\ElasticSearch\Plan\Index\GetIndexPlan;
use PHPUnit\Framework\TestCase;

class GetIndexPlanTest extends TestCase
{
    private const INDEX = 'index';
    private const EXPECTED = [
        'index' => self::INDEX,
    ];

    /** @var GetIndexPlan */
    private $plan;

    public function setUp(): void
    {
        $this->plan = new GetIndexPlan(self::INDEX);
    }

    public function testPrepare(): void
    {
        $this->assertSame(self::EXPECTED, $this->plan->prepare());
    }
}
