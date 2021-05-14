<?php

declare(strict_types=1);

namespace Test;

use Elasticsearch\Client;
use Elasticsearch\Namespaces\IndicesNamespace;
use Elasticsearch\Namespaces\SnapshotNamespace;
use Leverage\ElasticSearch\ElasticSearch;
use Leverage\ElasticSearch\Plan\Index;
use Leverage\ElasticSearch\Plan\Snapshot;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ElasticSearchTest extends TestCase
{
    private const EXPECTED = [
        'response' => 'data',
    ];

    /** @var ElasticSearch */
    private $elasticSearch;

    /** @var Client */
    private $client;

    /** @var IndicesNamespace&MockObject */
    private $indices;

    /** @var SnapshotNamespace&MockObject */
    private $snapshot;

    public function setUp(): void
    {
        $this->client = $this->mockClient();
        $this->elasticSearch = new ElasticSearch($this->client);
    }

    private function mockClient(): Client
    {
        $this->indices = $this->createMock(IndicesNamespace::class);
        $this->snapshot = $this->createMock(SnapshotNamespace::class);

        $client = $this->createMock(Client::class);
        $client->method('snapshot')->willReturn($this->snapshot);

        return $client;
    }

    #region Index
    private function testCreateIndex(): void
    {
        $this->indices->method('create')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Index\CreateIndexPlan::class);
        $response = $this->elasticSearch->createIndex($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    private function testDeleteIndex(): void
    {
        $this->indices->method('create')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Index\DeleteIndexPlan::class);
        $response = $this->elasticSearch->deleteIndex($plan);
        $this->assertSame(self::EXPECTED, $response);
    }
    #region

    #region Snapshot
    public function testCreateSnapshot(): void
    {
        $this->snapshot->method('create')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Snapshot\CreateSnapshotPlan::class);
        $response = $this->elasticSearch->createSnapshot($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testDeleteSnapshot(): void
    {
        $this->snapshot->method('delete')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Snapshot\DeleteSnapshotPlan::class);
        $response = $this->elasticSearch->deleteSnapshot($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testGetSnapshot(): void
    {
        $this->snapshot->method('get')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Snapshot\GetSnapshotPlan::class);
        $response = $this->elasticSearch->getSnapshot($plan);
        $this->assertSame(self::EXPECTED, $response);
    }
    #endregion
}
