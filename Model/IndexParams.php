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
     * @var array
     */
    private $options = [];

    /**
     * @param string $index
     * @param string $type
     * @param string $id
     */
    public function __construct($index, $type, $id = null)
    {
        $this->index = $index;
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $asArray = [
            'index' => $this->getIndex(),
            'type' => $this->getType(),
            'body' => $this->getBody()
        ];
        if (!empty($this->getId())) {
            $asArray['id'] = $this->getId();
        }

        return $asArray + $this->options;
    }

    /**
     * @param array $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @param $name
     * @param $value
     */
    public function setOption($name, $value)
    {
        $this->options[$name] = $value;
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
