<?php

declare(strict_types=1);

namespace Test\Plan\Snapshot;

use Leverage\ElasticSearch\Plan\Snapshot\StatusSnapshotPlan;
use PHPUnit\Framework\TestCase;

class StatusSnapshotPlanTest extends TestCase
{
    private const REPOSITORY = 'repository';
    private const SNAPSHOT = 'snapshot';
    private const EXPECTED = [
        'repository' => self::REPOSITORY,
        'snapshot' => self::SNAPSHOT,
    ];

    /** @var StatusSnapshotPlan */
    private $plan;

    public function setUp(): void
    {
        $this->plan = new StatusSnapshotPlan(
            self::REPOSITORY,
            self::SNAPSHOT
        );
    }

    public function testPrepare(): void
    {
        $this->assertSame(self::EXPECTED, $this->plan->prepare());
    }
}
