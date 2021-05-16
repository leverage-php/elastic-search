<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Leaf;

use Leverage\ElasticSearch\Interfaces\LeafInterface;

class Term implements LeafInterface
{
    /** @var string */
    private $key;

    /** @var mixed */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct(
        string $key,
        $value
    ) {
        $this->key = $key;
        $this->value = $value;
    }

    public function jsonSerialize(): array
    {
        return [
            'term' => [
                $this->key => $this->value,
            ],
        ];
    }
}
