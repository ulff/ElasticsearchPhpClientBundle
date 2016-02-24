<?php

namespace Ulff\ElasticsearchPhpClientBundle\Exception;

class MaxAllowedSearchResultsSizeExceededException extends \Exception
{
    public function __construct(int $size)
    {
        $this->message = 'Tried to set exceeded size of search results: ' . $size;
    }
}
