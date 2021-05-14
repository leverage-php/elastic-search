<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Repository;

use Leverage\ElasticSearch\Interfaces\RepositorySettingsInterface;

class CreateRepositoryPlan extends AbstractRepositoryPlan
{
    /** @var string */
    private $type;

    /** @var RepositorySettingsInterface */
    private $settings;

    public function __construct(
        string $name,
        string $type,
        RepositorySettingsInterface $settings
    ) {
        parent::__construct($name);

        $this->type = $type;
        $this->settings = $settings;
    }

    public function prepare(
        array $plan = []
    ): array {
        return parent::prepare([
            'body' => [
                'type' => $this->type,
                'settings' => $this->settings->prepare(),
            ],
        ]);
    }
}
