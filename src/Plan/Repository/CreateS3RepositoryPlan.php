<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Repository;

use Leverage\ElasticSearch\Plan\Repository\Settings\S3RepositorySettings;

class CreateS3RepositoryPlan extends CreateRepositoryPlan
{
    public function __construct(
        string $name,
        S3RepositorySettings $settings
    ) {
        parent::__construct($name, 's3', $settings);
    }
}
