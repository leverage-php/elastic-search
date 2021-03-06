<?php

declare(strict_types=1);

namespace Test;

use Elasticsearch\Client;
use Elasticsearch\Namespaces\IndicesNamespace;
use Elasticsearch\Namespaces\SnapshotNamespace;
use Elasticsearch\Namespaces\TasksNamespace;
use Leverage\ElasticSearch\ElasticSearch;
use Leverage\ElasticSearch\Plan;
use Leverage\ElasticSearch\Plan\Index;
use Leverage\ElasticSearch\Plan\Mapping;
use Leverage\ElasticSearch\Plan\Repository;
use Leverage\ElasticSearch\Plan\Snapshot;
use Leverage\ElasticSearch\Plan\Task;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ElasticSearchTest extends TestCase
{
    private const EXPECTED = [
        'response' => 'data',
    ];

    /** @var ElasticSearch */
    private $elasticSearch;

    /** @var Client&MockObject */
    private $client;

    /** @var IndicesNamespace&MockObject */
    private $indices;

    /** @var SnapshotNamespace&MockObject */
    private $snapshot;

    /** @var TasksNamespace&MockObject */
    private $task;

    public function setUp(): void
    {
        $this->client = $this->mockClient();
        $this->elasticSearch = new ElasticSearch($this->client);
    }

    /**
     * @return Client&MockObject
     */
    private function mockClient(): Client
    {
        $this->indices = $this->createMock(IndicesNamespace::class);
        $this->snapshot = $this->createMock(SnapshotNamespace::class);
        $this->task = $this->createMock(TasksNamespace::class);

        $client = $this->createMock(Client::class);
        $client->method('indices')->willReturn($this->indices);
        $client->method('snapshot')->willReturn($this->snapshot);
        $client->method('tasks')->willReturn($this->task);

        return $client;
    }

    #region Base
    public function testBulk(): void
    {
        $this->client->method('bulk')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Plan\BulkPlan::class);
        $response = $this->elasticSearch->bulk($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testGet(): void
    {
        $this->client->method('get')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Plan\GetPlan::class);
        $response = $this->elasticSearch->get($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testIndex(): void
    {
        $this->client->method('index')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Plan\IndexPlan::class);
        $response = $this->elasticSearch->index($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testReindex(): void
    {
        $this->client->method('reindex')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Plan\ReindexPlan::class);
        $response = $this->elasticSearch->reindex($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testSearch(): void
    {
        $this->client->method('search')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Plan\SearchPlan::class);
        $response = $this->elasticSearch->search($plan);
        $this->assertSame(self::EXPECTED, $response);
    }
    #endregion

    #region Index
    public function testCreateIndex(): void
    {
        $this->indices->method('create')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Index\CreateIndexPlan::class);
        $response = $this->elasticSearch->createIndex($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testDeleteIndex(): void
    {
        $this->indices->method('delete')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Index\DeleteIndexPlan::class);
        $response = $this->elasticSearch->deleteIndex($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testGetIndex(): void
    {
        $this->indices->method('get')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Index\GetIndexPlan::class);
        $response = $this->elasticSearch->getIndex($plan);
        $this->assertSame(self::EXPECTED, $response);
    }
    #endregion

    #region Mapping
    public function testGetMapping(): void
    {
        $this->indices->method('getMapping')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Mapping\GetMappingPlan::class);
        $response = $this->elasticSearch->getMapping($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testPutMapping(): void
    {
        $this->indices->method('putMapping')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Mapping\PutMappingPlan::class);
        $response = $this->elasticSearch->putMapping($plan);
        $this->assertSame(self::EXPECTED, $response);
    }
    #endregion

    #region Repository
    public function testCreateRepository(): void
    {
        $this->snapshot->method('createRepository')
            ->willReturn(self::EXPECTED)
        ;
        $plan = $this->createMock(Repository\CreateRepositoryPlan::class);
        $response = $this->elasticSearch->createRepository($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testDeleteRepository(): void
    {
        $this->snapshot->method('deleteRepository')
            ->willReturn(self::EXPECTED)
        ;
        $plan = $this->createMock(Repository\DeleteRepositoryPlan::class);
        $response = $this->elasticSearch->deleteRepository($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testGetRepository(): void
    {
        $this->snapshot->method('getRepository')
            ->willReturn(self::EXPECTED)
        ;
        $plan = $this->createMock(Repository\GetRepositoryPlan::class);
        $response = $this->elasticSearch->getRepository($plan);
        $this->assertSame(self::EXPECTED, $response);
    }
    #endregion

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

    public function testRestoreSnapshot(): void
    {
        $this->snapshot->method('restore')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Snapshot\RestoreSnapshotPlan::class);
        $response = $this->elasticSearch->restoreSnapshot($plan);
        $this->assertSame(self::EXPECTED, $response);
    }

    public function testStatusSnapshot(): void
    {
        $this->snapshot->method('status')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Snapshot\StatusSnapshotPlan::class);
        $response = $this->elasticSearch->statusSnapshot($plan);
        $this->assertSame(self::EXPECTED, $response);
    }
    #endregion

    #region Task
    public function testGetTask(): void
    {
        $this->task->method('get')->willReturn(self::EXPECTED);
        $plan = $this->createMock(Task\GetTaskPlan::class);
        $response = $this->elasticSearch->getTask($plan);
        $this->assertSame(self::EXPECTED, $response);
    }
    #endregion
}
