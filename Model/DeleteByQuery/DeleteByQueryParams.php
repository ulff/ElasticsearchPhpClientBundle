<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model\DeleteByQuery;

class DeleteByQueryParams
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
     */
    public function __construct($index, $type)
    {
        $this->index = $index;
        $this->type = $type;
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
        ];

        return $asArray + $this->options;
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
        if (empty($this->body)) {
            return [
                'query' => [
                    'match_all' => new \stdClass(),
                ]
            ];
        }
        return $this->body;
    }

    /**
     * @param array $body
     */
    public function setBody(array $body)
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
}
