<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Plan\Repository;

class CreateRepositoryPlan implements PlanInterface
{
    /** @var string */
    private $name;

    /** @var string */
    private $type;

    /** @var array */
    private $settings;

    public function __construct(
        string $name,
        string $type,
        RepositorySettingsInterface $settings
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->settings = $settings;
    }

    public function serializePlan(): array
    {
        return [
            'repository' => $this->name,
            'type' => $this->type,
            'settings' => $this->serializeSettings(),
        ];
    }
}
