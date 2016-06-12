<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

use Ulff\ElasticsearchPhpClientBundle\Exception\MaxAllowedSearchResultsSizeExceededException;

class SearchParams
{
    const DEFAULT_FROM = 0;
    const DEFAULT_SIZE = 10;
    const MAX_ALLOWED_SIZE = 10000;

    /**
     * @var string
     */
    private $index;

    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private $body;

    /**
    * @var int
    */
    private $from;

    /**
     * @var int
     */
    private $size;

    /**
     * @var array
     */
    private $options = [];

    /**
     * @param string $index
     * @param string $type
     */
    public function __construct($index, $type)
    {
        $this->index = $index;
        $this->type = $type;
        $this->from = self::DEFAULT_FROM;
        $this->size = self::DEFAULT_SIZE;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $asArray = [
            'index' => $this->getIndex(),
            'type' => $this->getType(),
            'body' => $this->getBody(),
            'from' => $this->getFrom(),
            'size' => $this->getSize(),
        ];

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
     * @param int $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        if ($size > self::MAX_ALLOWED_SIZE) {
            throw new MaxAllowedSearchResultsSizeExceededException($size);
        }
        $this->size = $size;
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
     * @return array
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return int
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param $name
     * @param $value
     */
    public function setOption($name, $value)
    {
        $this->options[$name] = $value;
    }
}
