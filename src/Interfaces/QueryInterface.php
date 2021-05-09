<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Interfaces;

interface QueryInterface
{
    public function serializeQuery(): array;
}
