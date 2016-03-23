<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

class SearchResponse
{
    /**
     * @var int
     */
    private $took;

    /**
     * @var bool
     */
    private $timedOut;

    /**
     * @var array
     */
    private $shards;

    /**
     * @var SearchHits
     */
    private $hits;

    /**
     * @var array
     */
    private $originalResponse;

    /**
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->took = $response['took'];
        $this->timedOut = $response['timed_out'];
        $this->shards = $response['_shards'];
        $this->hits = new SearchHits($response['hits']);
        $this->originalResponse = $response;
    }

    /**
     * @return int
     */
    public function getTook()
    {
        return $this->took;
    }

    /**
     * @return bool
     */
    public function wasTimedOut()
    {
        return $this->timedOut;
    }

    /**
     * @return array
     */
    public function getShards()
    {
        return $this->shards;
    }

    /**
     * @return SearchHits
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * @return array
     */
    public function getOriginalResponse()
    {
        return $this->originalResponse;
    }
}
