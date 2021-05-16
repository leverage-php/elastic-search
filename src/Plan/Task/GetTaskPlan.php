<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Task;

class GetTaskPlan
{
    /** @var string */
    private $id;

    public function __construct(
        string $id
    ) {
        $this->id = $id;
    }

    public function prepare(): array
    {
        return [
            'task_id' => $this->id,
        ];
    }
}
