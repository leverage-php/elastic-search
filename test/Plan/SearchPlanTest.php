<?php

declare(strict_types=1);

namespace Test\Plan;

use Leverage\ElasticSearch\Plan\SearchPlan;
use PHPUnit\Framework\TestCase;

class SearchPlanTest extends TestCase
{
    private const INDEX = 'index';
    private const SIZE = 10;
    private const TYPE = 'type';

    /** @var SearchPlan */
    private $plan;

    public function setUp(): void
    {
        $this->plan = new SearchPlan(self::INDEX, self::TYPE);
    }

    public function testPrepare(): void
    {
        $EXPECTED = [
            'index' => self::INDEX,
            'type' => self::TYPE,
        ];

        $this->assertSame($EXPECTED, $this->plan->prepare());
    }

    public function testPrepareSize(): void
    {
        $this->plan->setSize(self::SIZE);

        $EXPECTED = [
            'index' => self::INDEX,
            'type' => self::TYPE,
            'size' => self::SIZE,
        ];

        $this->assertSame($EXPECTED, $this->plan->prepare());
    }
}
