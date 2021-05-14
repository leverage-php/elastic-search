<?php

declare(strict_types=1);

namespace Test\Plan\Index;

use Leverage\ElasticSearch\Plan\Index\DeleteIndexPlan;
use PHPUnit\Framework\TestCase;

class DeleteIndexPlanTest extends TestCase
{
    private const INDEX = 'index';
    private const EXPECTED = [
        'index' => self::INDEX,
    ];

    /** @var DeleteIndexPlan */
    private $plan;

    public function setUp(): void
    {
        $this->plan = new DeleteIndexPlan(self::INDEX);
    }

    public function testPrepare(): void
    {
        $this->assertSame(self::EXPECTED, $this->plan->prepare());
    }
}
