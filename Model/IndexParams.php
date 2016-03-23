<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

class IndexParams
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
     * @var array
     */
    private $body;

    /**
     * @param string $index
     * @param string $type
     * @param string $id
     */
    public function __construct($index, $type, $id)
    {
        $this->index = $index;
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'index' => $this->getIndex(),
            'type' => $this->getType(),
            'id' => $this->getId(),
            'body' => $this->getBody()
        ];
    }

    /**
     * @param array $body
     */
    public function setBody($body)
    {
        $this->body = $body;
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
     * @return array
     */
    public function getBody()
    {
        return $this->body;
    }
}
