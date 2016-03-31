<?php

namespace Ulff\ElasticsearchPhpClientBundle\Service;

use Ulff\ElasticsearchPhpClientBundle\Client\ElasticSearchPhpClient;

class ElasticSearchPurger
{
    /**
     * @var ElasticSearchPhpClient
     */
    private $client;

    /**
     * @param ElasticSearchPhpClient $client
     */
    public function __construct(ElasticSearchPhpClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $indexName
     */
    public function purgeIndex($indexName)
    {
        if($this->client->getNativeClient()->indices()->exists(['index' => $indexName])) {
            $this->client->getNativeClient()->indices()->delete(['index' => $indexName]);
        }
        $this->client->getNativeClient()->indices()->create(['index' => $indexName]);
        $this->client->getNativeClient()->cluster()->health([
            'wait_for_status' => 'yellow'
        ]);
    }
}
