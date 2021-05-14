<?php

declare(strict_types=1);

namespace Test\Plan;

use Leverage\ElasticSearch\Plan\ReindexPlan;
use PHPUnit\Framework\TestCase;

class ReindexPlanTest extends TestCase
{
    private const SOURCE_INDEX = 'source';
    private const DEST_INDEX = 'dest';
    private const EXPECTED = [
        'body' => [
            'source' => [
                'index' => self::SOURCE_INDEX,
            ],
            'dest' => [
                'index' => self::DEST_INDEX,
            ],
        ],
    ];

    /** @var ReindexPlan */
    private $plan;

    public function setUp(): void
    {
        $this->plan = new ReindexPlan(self::SOURCE_INDEX, self::DEST_INDEX);
    }

    public function testPrepare(): void
    {
        $this->assertSame(self::EXPECTED, $this->plan->prepare());
    }
}
