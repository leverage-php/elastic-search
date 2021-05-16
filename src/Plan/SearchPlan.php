<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan;

use Leverage\ElasticSearch\Interfaces\QueryInterface;

class SearchPlan
{
    /** @var string */
    private $index;

    /** @var string */
    private $type;

    /** @var ?QueryInterface */
    private $query;

    /** @var int */
    private $size = null;

    public function __construct(
        string $index,
        string $type,
        QueryInterface $query = null
    ) {
        $this->index = $index;
        $this->type = $type;
        $this->query = $query;
    }

    public function prepare(): array
    {
        $plan = [
            'index' => $this->index,
            'type' => $this->type,
        ];

        if ($this->query !== null) {
            $plan['body'] = [
                'query' => $this->query,
            ];
        }

        if ($this->size !== null) {
            $plan['size'] = $this->size;
        }

        return $plan;
    }

    public function setSize(
        int $size
    ): self {
        $this->size = $size;
        return $this;
    }
}
