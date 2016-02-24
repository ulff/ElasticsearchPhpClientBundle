<?php

namespace Ulff\ElasticsearchPhpClientBundle\Client;

use Ulff\ElasticsearchPhpClientBundle\Model\DeleteParams;
use Ulff\ElasticsearchPhpClientBundle\Model\DeleteResponse;
use Ulff\ElasticsearchPhpClientBundle\Model\GetParams;
use Ulff\ElasticsearchPhpClientBundle\Model\GetResponse;
use Ulff\ElasticsearchPhpClientBundle\Model\IndexParams;
use Ulff\ElasticsearchPhpClientBundle\Model\IndexResponse;
use Ulff\ElasticsearchPhpClientBundle\Model\SearchParams;
use Ulff\ElasticsearchPhpClientBundle\Model\SearchResponse;

final class ElasticSearchPhpClient
{
    /**
     * @var \Elasticsearch\Client
     */
    private $client;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $port;

    /**
     * ElasticSearchPhpClient constructor.
     * @param string $host
     * @param string $port
     */
    public function __construct(array $params)
    {
        $this->validateSetup();
        $this->retrieveParams($params);

        $this->client = \Elasticsearch\ClientBuilder::create()->setHosts([$this->host.':'.$this->port])->build();
    }

    /**
     * @return \Elasticsearch\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param IndexParams $params
     * @return IndexResponse
     */
    public function index(IndexParams $params): IndexResponse
    {
        return new IndexResponse($this->client->index($params->toArray()));
    }

    /**
     * @param SearchParams $params
     * @return SearchResponse
     */
    public function search(SearchParams $params): SearchResponse
    {
        return new SearchResponse($this->client->search($params->toArray()));
    }

    /**
     * @param GetParams $params
     * @return GetResponse
     */
    public function get(GetParams $params): GetResponse
    {
        return new GetResponse($this->client->get($params->toArray()));
    }

    /**
     * @param DeleteParams $params
     * @return DeleteResponse
     */
    public function delete(DeleteParams $params): DeleteResponse
    {
        return new DeleteResponse($this->client->delete($params->toArray()));
    }

    private function validateSetup()
    {
        if(!class_exists('\Elasticsearch\ClientBuilder')) {
            throw new \Exception('Missing dependencies: missing Elasticsearch Client');
        }
    }

    private function retrieveParams(array $params)
    {
        if(empty($params['elastic_host'])) {
            throw new \Exception('Missing configuration: elastic_host');
        }
        if(empty($params['elastic_port'])) {
            throw new \Exception('Missing configuration: elastic_port');
        }
        $this->host = $params['elastic_host'];
        $this->port = $params['elastic_port'];
    }
}
