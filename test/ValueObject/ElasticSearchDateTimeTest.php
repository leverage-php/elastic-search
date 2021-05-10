<?php

declare(strict_types=1);

namespace Test\ValueObject;

use DateTime;
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
        $at = DateTime::createFromFormat(
            self::FORMAT,
            self::AT
        );
        $this->at = new ElasticSearchDateTime($at);
    }

    public function testJsonSerialize(): void
    {
        $at = $this->at->jsonSerialize();
        $this->assertSame('2021-05-10T09:28:00.000Z', $at);
    }
}
