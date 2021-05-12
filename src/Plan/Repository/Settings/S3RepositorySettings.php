<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Repository\Settings;

use Leverage\ElasticSearch\Interfaces\RepositorySettingsInterface;

class S3RepositorySettings implements RepositorySettingsInterface
{
    /** @var string */
    private $account;

    /** @var string */
    private $bucket;

    /** @var string */
    private $region;

    /** @var string */
    private $role;

    public function prepare(): array
    {
        return [
            'bucket' => $this->bucket,
            'region' => $this->region,
            'role_arn' => "arn:aws:iam::{$this->account}:role/{$this->role}",
        ];
    }

    public function setAccount(
        string $account
    ): self {
        $this->account = $account;
        return $this;
    }

    public function setBucket(
        string $bucket
    ): self {
        $this->bucket = $bucket;
        return $this;
    }

    public function setRegion(
        string $region
    ): self {
        $this->region = $region;
        return $this;
    }

    public function setRole(
        string $role
    ): self {
        $this->role = $role;
        return $this;
    }
}
