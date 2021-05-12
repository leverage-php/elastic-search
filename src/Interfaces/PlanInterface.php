<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Interfaces;

interface PlanInterface
{
    public function prepare(): array;
}
