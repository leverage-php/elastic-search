<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Repository;

abstract class AbstractRepositoryPlan
{
    /** @var string */
    private $name;

    public function __construct(
        string $name
    ) {
        $this->name = $name;
    }

    public function prepare(
        array $plan = []
    ): array {
        return array_merge($plan, [
            'repository' => $this->name,
        ]);
    }
}
