<?php

declare(strict_types=1);

namespace Test\Leaf;

use Leverage\ElasticSearch\Leaf\Term;
use PHPUnit\Framework\TestCase;

class TermTest extends TestCase
{
    private const KEY = 'key';
    private const VALUE = 'value';
    private const EXPECTED = [
        'term' => [
            self::KEY => self::VALUE,
        ],
    ];

    /** @var Term */
    private $term;

    public function setUp(): void
    {
        $this->term = new Term(self::KEY, self::VALUE);
    }

    public function testSerialize(): void
    {
        $this->assertSame(self::EXPECTED, $this->term->jsonSerialize());
    }
}
