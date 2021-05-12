<?php

declare(strict_types=1);

namespace Test\Plan\RepositorysSettings;

use Leverage\ElasticSearch\Plan\Repository\Settings\S3RepositorySettings;
use PHPUnit\Framework\TestCase;

class S3RepositorySettingsTest extends TestCase
{
    private const ACCOUNT = 'account';
    private const BUCKET = 'bucket';
    private const REGION = 'region';
    private const ROLE = 'role';
    private const EXPECTED = [
        'bucket' => self::BUCKET,
        'region' => self::REGION,
        'role_arn' => 'arn:aws:iam::' . self::ACCOUNT . ':role/' . self::ROLE,
    ];

    public function testPrepare(): void
    {
        $settings = (new S3RepositorySettings)
            ->setAccount(self::ACCOUNT)
            ->setBucket(self::BUCKET)
            ->setRegion(self::REGION)
            ->setRole(self::ROLE)
        ;
        $this->assertSame(self::EXPECTED, $settings->prepare());
    }
}
