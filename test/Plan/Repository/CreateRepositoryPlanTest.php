<?php

declare(strict_types=1);

namespace Test\Plan\Repository;

use Leverage\ElasticSearch\Interfaces\RepositorySettingsInterface;
use Leverage\ElasticSearch\Plan\Repository\CreateRepositoryPlan;
use PHPUnit\Framework\TestCase;

class CreateRepositoryPlanTest extends TestCase
{
    private const NAME = 'name';
    private const TYPE = 'type';
    private const SETTINGS = [
        'foo' => 'bar',
    ];
    private const EXPECTED = [
        'repository' => self::NAME,
        'body' => [
            'type' => self::TYPE,
            'settings' => self::SETTINGS,
        ],
    ];

    /** @var CreateRepositoryPlan */
    private $plan;

    /** @var RepositorySettingsInterface */
    private $settings;

    public function setUp(): void
    {
        $this->settings = $this->mockSettings();
        $this->plan = new CreateRepositoryPlan(
            self::NAME,
            self::TYPE,
            $this->settings
        );
    }

    private function mockSettings(): RepositorySettingsInterface
    {
        $settings = $this->createMock(RepositorySettingsInterface::class);
        $settings->method('prepare')->willReturn(self::SETTINGS);
        return $settings;
    }

    public function testPrepare(): void
    {
        $this->assertEquals(self::EXPECTED, $this->plan->prepare());
    }
}
