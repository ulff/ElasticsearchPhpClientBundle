<?php

namespace Ulff\ElasticsearchPhpClientBundle\Service;

use Ulff\ElasticsearchPhpClientBundle\Client\ElasticSearchPhpClient;

class ElasticSearchPurger
{
    /**
     * @var ElasticSearchPhpClient
     */
    private $client;

    public function __construct(ElasticSearchPhpClient $client)
    {
        $this->client = $client;
    }

    public function purgeIndex(string $indexName)
    {
        $this->client->getNativeClient()->indices()->delete(['index' => $indexName]);
        $this->client->getNativeClient()->indices()->create(['index' => $indexName]);
    }
}
