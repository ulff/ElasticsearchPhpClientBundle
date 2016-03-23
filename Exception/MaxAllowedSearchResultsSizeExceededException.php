<?php

namespace Ulff\ElasticsearchPhpClientBundle\Exception;

class MaxAllowedSearchResultsSizeExceededException extends \Exception
{
    /**
     * @param int $size
     */
    public function __construct($size)
    {
        $this->message = 'Tried to set exceeded size of search results: ' . $size;
    }
}
