<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Index;

class CreateIndexPlan extends AbstractIndexPlan
{
    /** @var int */
    private $numberOfShards = 1;

    /** @var int */
    private $numberOfReplicas = 0;

    public function prepare(): array
    {
        return array_merge(parent::prepare(), [
            'body' => [
                'number_of_shards' => $this->numberOfShards,
                'number_of_replicas' => $this->numberOfReplicas,
            ],
        ]);
    }

    public function setNumberOfShards(
        int $numberOfShards
    ): self {
        $this->numberOfShards = $numberOfShards;
        return $this;
    }

    public function setNumberOfReplicas(
        int $numberOfReplicas
    ): self {
        $this->numberOfReplicas = $numberOfReplicas;
        return $this;
    }
}
