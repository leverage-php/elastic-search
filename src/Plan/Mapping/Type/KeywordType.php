<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Mapping\Type;

use Leverage\ElasticSearch\Interfaces\MappingTypeInterface;

class KeywordType implements MappingTypeInterface
{
    /** @var string */
    private $field;

    public function __construct(
        string $field
    ) {
        $this->field = $field;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'keyword',
        ];
    }
}
