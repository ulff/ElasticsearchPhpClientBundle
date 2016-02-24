<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

class DeleteResponse
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
     * @var boolean
     */
    private $found;

    /**
     * @var array
     */
    private $shards;

    /**
     * @var array
     */
    private $originalResponse;

    /**
     * GetResponse constructor.
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->index = $response['_index'];
        $this->type = $response['_type'];
        $this->id = $response['_id'];
        $this->version = $response['_version'];
        $this->found = $response['found'];
        $this->shards = $response['_shards'];
        $this->originalResponse = $response;
    }

    /**
     * @return string
     */
    public function getIndex(): string
    {
        return $this->index;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @return boolean
     */
    public function wasFound(): boolean
    {
        return $this->found;
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
    public function getOriginalResponse(): array
    {
        return $this->originalResponse;
    }

}
