<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

class SearchHits
{
    /**
     * @var int
     */
    private $total;

    /**
     * @var float
     */
    private $maxScore;

    /**
     * @var SearchHitItem[]
     */
    private $searchHitItems;

    public function __construct(array $searchHits)
    {
        $this->total = $searchHits['total'];
        $this->maxScore = $searchHits['max_score'];
        $this->searchHitItems = [];
        foreach ($searchHits['hits'] as $hitItem) {
            $this->searchHitItems[] = new SearchHitItem($hitItem);
        }
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return float
     */
    public function getMaxScore()
    {
        return $this->maxScore;
    }

    /**
     * @return SearchHitItem[]
     */
    public function getSearchHitItems()
    {
        return $this->searchHitItems;
    }
}
