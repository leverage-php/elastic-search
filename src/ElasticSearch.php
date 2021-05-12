<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch;

use Elasticsearch\Client;
use Leverage\ElasticSearch\Interfaces\PlanInterface;

class ElasticSearch
{
    private $client;

    public function __construct(
        Client $client
    ) {
        $this->client = $client;
    }

    public function bulk(
        PlanInterface $plan
    ): array {
        return $this->client->bulk($plan->prepare());
    }

    public function get(
        PlanInterface $plan
    ): array {
        return $this->client->get($plan->prepare());
    }

    public function index(
        PlanInterface $plan
    ): array {
        return $this->client->index($plan->prepare());
    }

    public function __call(
        string $method,
        array $args
    ) {
        return $this->client->$method(...$args);
    }
}
