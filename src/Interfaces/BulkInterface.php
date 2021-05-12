<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Interfaces;

interface BulkInterface
{
    public function prepareBody(): array;
    public function prepareHeader(): array;
}
