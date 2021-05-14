<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan;

use Leverage\ElasticSearch\Interfaces\BulkInterface;

class IndexPlan implements BulkInterface
{
    /** @var string */
    private $index;

    /** @var string */
    private $type;

    /** @var string */
    private $id;

    /** @var array */
    private $data;

    public function __construct(
        string $index,
        string $type,
        string $id,
        array $data
    ) {
        $this->index = $index;
        $this->type = $type;
        $this->id = $id;
        $this->data = $data;
    }

    public function prepareBody(): array
    {
        return $this->data;
    }

    public function prepareHeader(): array
    {
        return [
            'index' => [
                '_index' => $this->index,
                '_type' => $this->type,
                '_id' => $this->id,
            ],
        ];
    }

    public function prepare(): array
    {
        return [
            'index' => $this->index,
            'type' => $this->type,
            'id' => $this->id,
            'body' => $this->data,
        ];
    }
}
