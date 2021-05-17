<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Interfaces;

use JsonSerializable;

interface MappingTypeInterface extends JsonSerializable
{
    public function getField(): string;
}
