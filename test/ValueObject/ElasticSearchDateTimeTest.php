<?php

declare(strict_types=1);

namespace Test\ValueObject;

use Leverage\ElasticSearch\ValueObject\ElasticSearchDateTime;
use PHPUnit\Framework\TestCase;

class ElasticSearchDateTimeTest extends TestCase
{
    private const AT = '2021-05-10 09:28:00';
    private const FORMAT = 'Y-m-d H:i:s';

    /** @var ElasticSearchDateTime */
    private $at;

    public function setUp(): void
    {
        $this->at = ElasticSearchDateTime::createFromFormat(
            self::FORMAT,
            self::AT
        );
    }

    public function testJsonSerialize(): void
    {
        $at = $this->at->jsonSerialize();
        $this->assertSame('2021-05-10T09:28:00.000Z', $at);
    }
}
