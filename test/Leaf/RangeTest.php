<?php

declare(strict_types=1);

namespace Test\Leaf;

use Leverage\ElasticSearch\Leaf\Range;
use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    private const FIELD = 'field';
    private const GTE = 1;
    private const LT = 2;

    /** @var Range; */
    private $range;

    public function setUp(): void
    {
        $this->range = new Range(self::FIELD, self::GTE, self::LT);
    }

    public function testSerialize(): void
    {
        $EXPECTED = [
            'range' => [
                self::FIELD => [
                    'gte' => self::GTE,
                    'lt' => self::LT,
                ],
            ],
        ];

        $this->assertSame($EXPECTED, $this->range->jsonSerialize());
    }
}
