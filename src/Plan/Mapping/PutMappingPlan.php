<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Mapping;

use Leverage\ElasticSearch\Interfaces\MappingTypeInterface;

class PutMappingPlan extends AbstractMappingPlan
{
    /** @var MappingTypeInterface[] */
    private $properties = [];

    public function addMapping(
        MappingTypeInterface $mapping
    ): self {
        $this->properties[] = $mapping;
        return $this;
    }

    public function prepare(): array
    {
        $properties = [];
        foreach ($this->properties as $property) {
            $field = $property->getField();
            $properties[$field] = $property;
        }

        return array_merge(parent::prepare(), [
            'body' => [
                'properties' => $properties,
            ],
        ]);
    }
}
