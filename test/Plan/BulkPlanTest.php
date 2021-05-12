<?php

declare(strict_types=1);

namespace Test\Plan;

use Leverage\ElasticSearch\Interfaces\BulkInterface;
use Leverage\ElasticSearch\Plan\BulkPlan;
use PHPUnit\Framework\TestCase;

class BulkPlanTest extends TestCase
{
    private const BODY = [ 'body' => 'body' ];
    private const HEADER = [ 'header' => 'header' ];
    private const EXPECTED = [
        'body' => [
            self::HEADER,
            self::BODY,
            self::HEADER,
            self::BODY,
        ],
    ];

    public function testPrepare(): void
    {
        $plan = $this->createMock(BulkInterface::class);
        $plan->method('prepareBody')->willReturn(self::BODY);
        $plan->method('prepareHeader')->willReturn(self::HEADER);

        $bulk = new BulkPlan([
            $plan,
            $plan,
        ]);

        $this->assertSame(self::EXPECTED, $bulk->prepare());
    }
}
