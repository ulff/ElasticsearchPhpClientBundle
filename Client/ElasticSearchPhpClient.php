<?php

namespace Ulff\ElasticsearchPhpClientBundle\Client;

use Ulff\ElasticsearchPhpClientBundle\Model\DeleteByQuery\DeleteByQueryParams;
use Ulff\ElasticsearchPhpClientBundle\Model\DeleteByQuery\DeleteByQueryResponse;
use Ulff\ElasticsearchPhpClientBundle\Model\DeleteParams;
use Ulff\ElasticsearchPhpClientBundle\Model\DeleteResponse;
use Ulff\ElasticsearchPhpClientBundle\Model\GetParams;
use Ulff\ElasticsearchPhpClientBundle\Model\GetResponse;
use Ulff\ElasticsearchPhpClientBundle\Model\IndexParams;
use Ulff\ElasticsearchPhpClientBundle\Model\IndexResponse;
use Ulff\ElasticsearchPhpClientBundle\Model\SearchParams;
use Ulff\ElasticsearchPhpClientBundle\Model\SearchResponse;
use Ulff\ElasticsearchPhpClientBundle\Model\UpdateParams;
use Ulff\ElasticsearchPhpClientBundle\Model\UpdateResponse;

final class ElasticSearchPhpClient
{
    /**
     * @var \Elasticsearch\Client
     */
    private $nativeClient;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $port;

    /**
     * @param string $host
     * @param string $port
     */
    public function __construct(array $params)
    {
        $this->validateSetup();
        $this->retrieveParams($params);

        $this->nativeClient = \Elasticsearch\ClientBuilder::create()->setHosts([$this->host.':'.$this->port])->build();
    }

    /**
     * @return \Elasticsearch\Client
     */
    public function getNativeClient()
    {
        return $this->nativeClient;
    }

    /**
     * @param IndexParams $params
     * @return IndexResponse
     */
    public function index(IndexParams $params)
    {
        return new IndexResponse($this->nativeClient->index($params->toArray()));
    }

    /**
     * @param SearchParams $params
     * @return SearchResponse
     */
    public function search(SearchParams $params)
    {
        return new SearchResponse($this->nativeClient->search($params->toArray()));
    }

    /**
     * @param GetParams $params
     * @return GetResponse
     */
    public function get(GetParams $params)
    {
        return new GetResponse($this->nativeClient->get($params->toArray()));
    }

    /**
     * @param DeleteParams $params
     * @return DeleteResponse
     */
    public function delete(DeleteParams $params)
    {
        return new DeleteResponse($this->nativeClient->delete($params->toArray()));
    }

    /**
     * @param UpdateParams $params
     * @return UpdateResponse
     */
    public function update(UpdateParams $params)
    {
        return new UpdateResponse($this->nativeClient->update($params->toArray()));
    }

    /**
     * @param DeleteByQueryParams $params
     * @return DeleteByQueryResponse
     */
    public function deleteByQuery(DeleteByQueryParams $params)
    {
        $response = [];
        if ($this->getNativeClient()->indices()->exists(['index' => $params->getIndex()])) {
            $response = $this->getNativeClient()->deleteByQuery($params->toArray());
        }

        return new DeleteByQueryResponse($response);
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
