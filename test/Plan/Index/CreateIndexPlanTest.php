<?php

declare(strict_types=1);

namespace Test\Plan\Index;

use Leverage\ElasticSearch\Plan\Index\CreateIndexPlan;
use PHPUnit\Framework\TestCase;

class CreateIndexPlanTest extends TestCase
{
    private const INDEX = 'index';
    private const EXPECTED = [
        'index' => self::INDEX,
        'body' => [
            'number_of_shards' => 1,
            'number_of_replicas' => 0,
        ],
    ];

    /** @var CreateIndexPlan */
    private $plan;

    public function setUp(): void
    {
        $this->plan = new CreateIndexPlan(self::INDEX);
    }

    public function testPrepare(): void
    {
        $this->assertSame(self::EXPECTED, $this->plan->prepare());
    }
}
