<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Query;

use Leverage\ElasticSearch\Interfaces\BulkQueryInterface;
use Leverage\ElasticSearch\Interfaces\QueryInterface;

class IndexQuery implements BulkQueryInterface, QueryInterface
{
    /** @var string */
    private $index;

    /** @var string */
    private $type;

    /** @var string */
    private $id;

    /** @var array */
    private $body;

    public function __construct(
        string $index,
        string $type,
        string $id,
        array $body
    ) {
        $this->index = $index;
        $this->type = $type;
        $this->id = $id;
        $this->body = $body;
    }

    public function serializeBody(): array
    {
        return $this->body;
    }

    public function serializeHeader(): array
    {
        return [
            'index' => [
                '_index' => $this->index,
                '_type' => $this->type,
                '_id' => $this->id,
            ],
        ];
    }

    public function serializeQuery(): array
    {
        return [
            'index' => $this->index,
            'type' => $this->type,
            'id' => $this->id,
            'body' => $this->body,
        ];
    }
}
