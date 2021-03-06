<?php

declare(strict_types=1);

namespace Ulff\ElasticsearchPhpClientBundle\Model\DeleteByQuery;

class Retries
{
    /**
     * @var int
     */
    private $bulk;

    /**
     * @var mixed
     */
    private $search;

    public function __construct(array $retries = [])
    {
        $this->bulk = $retries['bulk'] ?? 0;
        $this->search = $retries['search'] ?? null;
    }

    /**
     * @return int
     */
    public function getBulk(): int
    {
        return $this->bulk;
    }

    /**
     * @return mixed
     */
    public function getSearch()
    {
        return $this->search;
    }
}
