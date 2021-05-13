<?php

declare(strict_types=1);

namespace Test\Plan\Repository;

use Leverage\ElasticSearch\Plan\Repository\CreateS3RepositoryPlan;
use Leverage\ElasticSearch\Plan\Repository\Settings\S3RepositorySettings;
use PHPUnit\Framework\TestCase;

class CreateS3RepositoryPlanTest extends TestCase
{
    private const NAME = 'name';
    private const SETTINGS = [
        'foo' => 'bar',
    ];
    private const EXPECTED = [
        'repository' => self::NAME,
        'body' => [
            'type' => 's3',
            'settings' => self::SETTINGS,
        ],
    ];

    /** @var CreateS3RepositoryPlan */
    private $plan;

    /** @var S3RepositorySettings */
    private $settings;

    public function setUp(): void
    {
        $this->settings = $this->mockSettings();
        $this->plan = new CreateS3RepositoryPlan(self::NAME, $this->settings);
    }

    private function mockSettings(): S3RepositorySettings
    {
        $settings = $this->createMock(S3RepositorySettings::class);
        $settings->method('prepare')->willReturn(self::SETTINGS);
        return $settings;
    }

    public function testPrepare(): void
    {
        $this->assertEquals(self::EXPECTED, $this->plan->prepare());
    }
}
