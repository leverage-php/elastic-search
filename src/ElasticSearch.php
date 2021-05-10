<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch;

use Elasticsearch\Client;
use Leverage\ElasticSearch\Interfaces\QueryInterface;

class ElasticSearch
{
    private $client;

    public function __construct(
        Client $client
    ) {
        $this->client = $client;
    }

    public function bulk(
        QueryInterface $query
    ): array {
        return $this->client->bulk($query->serializeQuery());
    }

    public function get(
        QueryInterface $query
    ): array {
        return $this->client->get($query->serializeQuery());
    }

    public function index(
        QueryInterface $query
    ): array {
        return $this->client->index($query->serializeQuery());
    }

    public function __call(
        string $method,
        array $args
    ) {
        return $this->client->$method(...$args);
    }
}
