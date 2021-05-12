<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Interfaces;

interface RepositorySettingsInterface
{
    public function prepare(): array;
}
