<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Repository;

use Leverage\ElasticSearch\Plan\Repository\Settings\S3RepositorySettings;

class CreateS3RepositoryPlan extends CreateRepositoryPlan
{
    /** @var S3RepositorySettings */
    private $settings;

    public function __construct(
        string $name,
        S3RepositorySettings $settings = null
    ) {
        $this->settings = $settings ?? new S3RepositorySettings;
        parent::__construct($name, 's3', $this->settings);
    }

    public function setAccount(
        string $account
    ): self {
        $this->settings->setAccount($account);
        return $this;
    }

    public function setBucket(
        string $bucket
    ): self {
        $this->settings->setBucket($bucket);
        return $this;
    }

    public function setRegion(
        string $region
    ): self {
        $this->settings->setRegion($region);
        return $this;
    }

    public function setRole(
        string $role
    ): self {
        $this->settings->setRole($role);
        return $this;
    }
}
