<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Query;

use Leverage\ElasticSearch\Interfaces\BulkQueryInterface;
use Leverage\ElasticSearch\Interfaces\QueryInterface;

class BulkQuery implements QueryInterface
{
    /** @var BulkQueryInterface[] */
    private $queries;

    public function __construct(
        array $queries
    ) {
        $this->queries = $queries;
    }

    public function serializeQuery(): array
    {
        $body = [];
        foreach ($this->queries as $query) {
            $body[] = $query->serializeHeader();
            $body[] = $query->serializeBody();
        }

        return [
            'body' => $body,
        ];
    }
}
