<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Snapshot;

abstract class AbstractSnapshotPlan
{
    /** @var string */
    private $repository;

    /** @var string */
    private $snapshot;

    public function __construct(
        string $repository,
        string $snapshot
    ) {
        $this->repository = $repository;
        $this->snapshot = $snapshot;
    }

    public function prepare(): array
    {
        return [
            'repository' => $this->repository,
            'snapshot' => $this->snapshot,
        ];
    }
}
