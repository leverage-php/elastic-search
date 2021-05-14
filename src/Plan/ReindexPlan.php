<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan;

class ReindexPlan
{
    /** @var string */
    private $sourceIndex;

    /** @var string */
    private $destIndex;

    public function __construct(
        string $sourceIndex,
        string $destIndex
    ) {
        $this->sourceIndex = $sourceIndex;
        $this->destIndex = $destIndex;
    }

    public function prepare(): array
    {
        return [
            'body' => [
                'source' => [
                    'index' => $this->sourceIndex,
                ],
                'dest' => [
                    'index' => $this->destIndex,
                ],
            ],
        ];
    }
}
