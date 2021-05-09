<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch;

use ElasticSearch\Client;

class ElasticSearch
{
    private $client;

    public function __construct(
        Client $client
    ) {
        $this->client = $client;
    }

    public function get(
        array $params
    ): array {
        return $this->client->get($params);
    }

    public function __call(
        string $method,
        array $args
    ) {
        return $this->client->$method(...$args);
    }
}
