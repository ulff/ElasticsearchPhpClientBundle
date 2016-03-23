<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

class GetParams
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
    public function toArray()
    {
        return [
            'index' => $this->getIndex(),
            'type' => $this->getType(),
            'id' => $this->getId()
        ];
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
}
