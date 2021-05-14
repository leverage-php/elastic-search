<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch;

use Elasticsearch\Client;
use Leverage\ElasticSearch\Interfaces\PlanInterface;
use Leverage\ElasticSearch\Plan\Index;
use Leverage\ElasticSearch\Plan\Repository;
use Leverage\ElasticSearch\Plan\Snapshot;

class ElasticSearch
{
    private $client;

    public function __construct(
        Client $client
    ) {
        $this->client = $client;
    }

    public function bulk(
        PlanInterface $plan
    ): array {
        return $this->client->bulk($plan->prepare());
    }

    public function get(
        PlanInterface $plan
    ): array {
        return $this->client->get($plan->prepare());
    }

    public function index(
        PlanInterface $plan
    ): array {
        return $this->client->index($plan->prepare());
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
