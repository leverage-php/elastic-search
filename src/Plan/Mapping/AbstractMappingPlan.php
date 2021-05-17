<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Mapping;

abstract class AbstractMappingPlan
{
    /** @var string */
    private $index;

    /** @var string */
    private $type;

    public function __construct(
        string $index,
        string $type
    ) {
        $this->index = $index;
        $this->type = $type;
    }

    public function prepare(): array
    {
        return [
            'index' => $this->index,
            'type' => $this->type,
        ];
    }
}
