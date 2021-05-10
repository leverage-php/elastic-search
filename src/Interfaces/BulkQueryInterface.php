<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Interfaces;

interface BulkQueryInterface
{
    public function serializeBody(): array;
    public function serializeHeader(): array;
}
