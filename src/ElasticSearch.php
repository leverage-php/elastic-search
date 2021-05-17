<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch;

use Elasticsearch\Client;
use Leverage\ElasticSearch\Plan;
use Leverage\ElasticSearch\Plan\Index;
use Leverage\ElasticSearch\Plan\Mapping;
use Leverage\ElasticSearch\Plan\Repository;
use Leverage\ElasticSearch\Plan\Snapshot;
use Leverage\ElasticSearch\Plan\Task;

class ElasticSearch
{
    private $client;

    public function __construct(
        Client $client
    ) {
        $this->client = $client;
    }

    public function bulk(
        Plan\BulkPlan $plan
    ): array {
        return $this->client->bulk($plan->prepare());
    }

    public function get(
        Plan\GetPlan $plan
    ): array {
        return $this->client->get($plan->prepare());
    }

    public function index(
        Plan\IndexPlan $plan
    ): array {
        return $this->client->index($plan->prepare());
    }

    public function reindex(
        Plan\ReindexPlan $plan
    ): array {
        return $this->client->reindex($plan->prepare());
    }

    public function search(
        Plan\SearchPlan $plan
    ): array {
        return $this->client->search($plan->prepare());
    }

    #region Index
    public function createIndex(
        Index\CreateIndexPlan $plan
    ): array {
        return $this->client->indices()->create($plan->prepare());
    }

    public function deleteIndex(
        Index\DeleteIndexPlan $plan
    ): array {
        return $this->client->indices()->delete($plan->prepare());
    }

    public function getIndex(
        Index\GetIndexPlan $plan
    ): array {
        /** @var array - Required to fix bad docblock type hint in vendor lib */
        return $this->client->indices()->get($plan->prepare());
    }
    #endregion

    #region Mapping
    public function getMapping(
        Mapping\GetMappingPlan $plan
    ): array {
        return $this->client->indices()->getMapping($plan->prepare());
    }

    public function putMapping(
        Mapping\PutMappingPlan $plan
    ): array {
        return $this->client->indices()->putMapping($plan->prepare());
    }
    #endregion

    #region Repository
    public function createRepository(
        Repository\CreateRepositoryPlan $plan
    ): array {
        return $this->client->snapshot()->createRepository($plan->prepare());
    }

    public function getRepository(
        Repository\GetRepositoryPlan $plan
    ): array {
        return $this->client->snapshot()->getRepository($plan->prepare());
    }

    public function deleteRepository(
        Repository\DeleteRepositoryPlan $plan
    ): array {
        return $this->client->snapshot()->deleteRepository($plan->prepare());
    }
    #endregion

    #region Snapshot
    public function createSnapshot(
        Snapshot\CreateSnapshotPlan $plan
    ): array {
        return $this->client->snapshot()->create($plan->prepare());
    }

    public function deleteSnapshot(
        Snapshot\DeleteSnapshotPlan $plan
    ): array {
        return $this->client->snapshot()->delete($plan->prepare());
    }

    public function getSnapshot(
        Snapshot\GetSnapshotPlan $plan
    ): array {
        return $this->client->snapshot()->get($plan->prepare());
    }

    public function restoreSnapshot(
        Snapshot\RestoreSnapshotPlan $plan
    ): array {
        return $this->client->snapshot()->restore($plan->prepare());
    }
    #endregion

    #region Task
    public function getTask(
        Task\GetTaskPlan $plan
    ): array {
        return $this->client->tasks()->get($plan->prepare());
    }
    #endregion

    /**
     * @return mixed
     */
    public function __call(
        string $method,
        array $args
    ) {
        return $this->client->$method(...$args);
    }
}
