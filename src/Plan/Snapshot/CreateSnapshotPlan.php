<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Snapshot;

class CreateSnapshotPlan extends AbstractSnapshotPlan
{
    /** @var string */
    private $index;

    public function __construct(
        string $repository,
        string $snapshot,
        string $index
    ) {
        parent::__construct($repository, $snapshot);
        $this->index = $index;
    }

    public function prepare(): array
    {
        return array_merge(parent::prepare(), [
            'body' => [
                'indices' => $this->index,
            ],
        ]);
    }
}
