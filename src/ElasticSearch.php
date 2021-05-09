<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch;

use ElasticSearch\Client;
use Leverage\ElasticSearch\Interfaces\QueryInterface;

class ElasticSearch
{
    private $client;

    public function __construct(
        Client $client
    ) {
        $this->client = $client;
    }

    public function get(
        QueryInterface $query
    ): array {
        return $this->client->get($query->serializeQuery());
    }
}
