<?php

declare(strict_types=1);

namespace Test\Plan\Repository;

use Leverage\ElasticSearch\Plan\Repository\GetRepositoryPlan;
use PHPUnit\Framework\TestCase;

class GetRepositoryPlanTest extends TestCase
{
    private const NAME = 'name';
    private const EXPECTED = [
        'repository' => self::NAME,
    ];

    /** @var GetRepositoryPlan */
    private $plan;

    public function setUp(): void
    {
        $this->plan = new GetRepositoryPlan(self::NAME);
    }

    public function testPrepare(): void
    {
        $this->assertEquals(self::EXPECTED, $this->plan->prepare());
    }
}
