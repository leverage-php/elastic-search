<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Query;

use Leverage\ElasticSearch\Interfaces\QueryInterface;

class GetQuery implements QueryInterface
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

    public function serializeQuery(): array
    {
        return [
            'index' => $this->index,
            'type' => $this->type,
            'id' => $this->id,
        ];
    }
}
