<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

class GetResponse
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
    private $source;

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
        $this->source = $response['_source'];
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
     * @return boolean
     */
    public function wasFound()
    {
        return $this->found;
    }

    /**
     * @return array
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return array
     */
    public function getOriginalResponse()
    {
        return $this->originalResponse;
    }

}
