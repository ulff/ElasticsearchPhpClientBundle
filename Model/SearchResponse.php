<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

use Elasticsearch\Helper\Iterators\SearchHitIterator;

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
     * @var array
     */
    private $hits;

    /**
     * @var array
     */
    private $originalResponse;

    /**
     * SearchResponse constructor.
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->took = $response['took'];
        $this->timedOut = $response['timed_out'];
        $this->shards = $response['_shards'];
        $this->hits = $response['hits'];
        $this->originalResponse = $response;
    }

    /**
     * @return int
     */
    public function getTook(): int
    {
        return $this->took;
    }

    /**
     * @return bool
     */
    public function wasTimedOut(): bool
    {
        return $this->timedOut;
    }

    /**
     * @return array
     */
    public function getShards(): array
    {
        return $this->shards;
    }

    /**
     * @return array
     */
    public function getHits(): array
    {
        return $this->hits;
    }

    /**
     * @return array
     */
    public function getOriginalResponse(): array
    {
        return $this->originalResponse;
    }
}
