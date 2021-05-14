<?php

declare(strict_types=1);

namespace Test\Plan\Snapshot;

use Leverage\ElasticSearch\Plan\Snapshot\CreateSnapshotPlan;
use PHPUnit\Framework\TestCase;

class CreateSnapshotPlanTest extends TestCase
{
    private const REPOSITORY = 'repository';
    private const SNAPSHOT = 'snapshot';
    private const INDEX = 'index';
    private const EXPECTED = [
        'repository' => self::REPOSITORY,
        'snapshot' => self::SNAPSHOT,
        'body' => [
            'indices' => 'index',
        ],
    ];

    /** @var CreateSnapshotPlan */
    private $plan;

    public function setUp(): void
    {
        $this->plan = new CreateSnapshotPlan(
            self::REPOSITORY,
            self::SNAPSHOT,
            self::INDEX
        );
    }

    public function testPrepare(): void
    {
        $this->assertSame(self::EXPECTED, $this->plan->prepare());
    }
}
