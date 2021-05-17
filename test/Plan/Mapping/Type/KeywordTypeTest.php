<?php

declare(strict_types=1);

namespace Test\Plan\Mapping\Type;

use Leverage\ElasticSearch\Plan\Mapping\Type\KeywordType;
use PHPUnit\Framework\TestCase;

class KeywordTypeTest extends TestCase
{
    private const FIELD = 'field';

    /** @var KeywordType */
    private $type;

    public function setUp(): void
    {
        $this->type = new KeywordType(self::FIELD);
    }

    public function testGetField(): void
    {
        $this->assertSame(self::FIELD, $this->type->getField());
    }

    public function testSerialize(): void
    {
        $EXPECTED = [
            'type' => 'keyword',
        ];

        $this->assertSame($EXPECTED, $this->type->jsonSerialize());
    }
}
