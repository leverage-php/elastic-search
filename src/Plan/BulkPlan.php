<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan;

use Leverage\ElasticSearch\Interfaces\BulkInterface;

class BulkPlan
{
    /** @var BulkInterface[] */
    private $plans;

    public function __construct(
        array $plans
    ) {
        $this->plans = $plans;
    }

    public function prepare(): array
    {
        $body = [];
        foreach ($this->plans as $plan) {
            $body[] = $plan->prepareHeader();
            $body[] = $plan->prepareBody();
        }

        return [
            'body' => $body,
        ];
    }
}
