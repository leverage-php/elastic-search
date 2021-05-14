<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Index;

abstract class AbstractIndexPlan
{
    /** @var string */
    private $index;

    public function __construct(
        string $index
    ) {
        $this->index = $index;
    }

    public function prepare(): array
    {
        return [
            'index' => $this->index,
        ];
    }
}
