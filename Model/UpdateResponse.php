<?php

declare(strict_types=1);

namespace Ulff\ElasticsearchPhpClientBundle\Model;

class UpdateResponse
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
     * @var array
     */
    private $originalResponse;

    /**
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->index = $response['_index'];
        $this->type = $response['_type'];
        $this->id = $response['_id'];
        $this->version = $response['_version'];
        $this->shards = isset($response['_shards']) ? $response['_shards'] : [];
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
     * @return array
     */
    public function getOriginalResponse()
    {
        return $this->originalResponse;
    }
}
