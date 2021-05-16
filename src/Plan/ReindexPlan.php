<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan;

use Leverage\ElasticSearch\Interfaces\QueryInterface;

class ReindexPlan
{
    /** @var string */
    private $sourceIndex;

    /** @var string */
    private $destIndex;

    /** @var ?QueryInterface */
    private $query;

    public function __construct(
        string $sourceIndex,
        string $destIndex,
        QueryInterface $query = null
    ) {
        $this->sourceIndex = $sourceIndex;
        $this->destIndex = $destIndex;
        $this->query = $query;
    }

    public function prepare(): array
    {
        $source = [
            'index' => $this->sourceIndex,
        ];

        if ($this->query) {
            $source['query'] = $this->query;
        }

        return [
            'body' => [
                'source' => $source,
                'dest' => [
                    'index' => $this->destIndex,
                ],
            ],
        ];
    }
}
