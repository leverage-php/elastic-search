<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Query;

use Leverage\ElasticSearch\Interfaces\LeafInterface;
use Leverage\ElasticSearch\Interfaces\QueryInterface;

class FilterQuery implements QueryInterface
{
    /** @var LeafInterface[] */
    private $filters = [];

    public function addFilter(
        LeafInterface $leaf
    ): self {
        $this->filters[] = $leaf;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'bool' => [
                'filter' => $this->filters,
            ],
        ];
    }
}
