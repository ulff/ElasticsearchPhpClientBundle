<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

class SearchHitItem
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
     * @var float
     */
    private $score;

    /**
     * @var array
     */
    private $source;

    /**
     * SearchHitItem constructor.
     * @param string $index
     * @param string $type
     * @param string $id
     * @param float $score
     * @param array $source
     */
    public function __construct(array $hitItem)
    {
        $this->index = $hitItem['_index'];
        $this->type = $hitItem['_type'];
        $this->id = $hitItem['_id'];
        $this->score = $hitItem['_score'];
        $this->source = $hitItem['_source'];
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
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return array
     */
    public function getSource()
    {
        return $this->source;
    }
}
