<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

class IndexResponse
{
    /**
     * @var string
     */
    private $index;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $version;

    /**
     * @var array
     */
    private $shards;

    /**
     * @var bool
     */
    private $created;

    /**
     * @var array
     */
    private $originalResponse;

    /**
     * IndexResponse constructor.
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->index = $response['_index'];
        $this->type = $response['_type'];
        $this->id = $response['_id'];
        $this->version = $response['_version'];
        $this->shards = $response['_shards'];
        $this->created = $response['created'];
        $this->originalResponse = $response;
    }

    /**
     * @return string
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return array
     */
    public function getShards()
    {
        return $this->shards;
    }

    /**
     * @return bool
     */
    public function wasCreated()
    {
        return $this->created;
    }

    /**
     * @return array
     */
    public function getOriginalResponse()
    {
        return $this->originalResponse;
    }
}
