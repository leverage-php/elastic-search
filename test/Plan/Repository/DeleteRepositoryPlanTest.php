<?php

declare(strict_types=1);

namespace Test\Plan\Repository;

use Leverage\ElasticSearch\Plan\Repository\DeleteRepositoryPlan;
use PHPUnit\Framework\TestCase;

class DeleteRepositoryPlanTest extends TestCase
{
    private const NAME = 'name';
    private const EXPECTED = [
        'repository' => self::NAME,
    ];

    /** @var DeleteRepositoryPlan */
    private $plan;

    public function setUp(): void
    {
        $this->plan = new DeleteRepositoryPlan(self::NAME);
    }

    public function testPrepare(): void
    {
        $this->assertEquals(self::EXPECTED, $this->plan->prepare());
    }
}
