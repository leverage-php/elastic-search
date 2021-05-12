<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan;

use Leverage\ElasticSearch\Interfaces\PlanInterface;

class GetPlan implements PlanInterface
{
    /** @var string */
    private $index;

    /** @var string */
    private $type;

    /** @var string */
    private $id;

    public function __construct(
        string $index,
        string $type,
        string $id
    ) {
        $this->index = $index;
        $this->type = $type;
        $this->id = $id;
    }

    public function prepare(): array
    {
        return [
            'index' => $this->index,
            'type' => $this->type,
            'id' => $this->id,
        ];
    }
}
