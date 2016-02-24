<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

use Ulff\ElasticsearchPhpClientBundle\Exception\MaxAllowedSearchResultsSizeExceededException;

class SearchParams
{
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
    private $size;

    /**
     * SearchParams constructor.
     * @param string $index
     * @param string $type
     */
    public function __construct(string $index, string $type)
    {
        $this->index = $index;
        $this->type = $type;
        $this->size = self::DEFAULT_SIZE;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'index' => $this->getIndex(),
            'type' => $this->getType(),
            'body' => $this->getBody(),
            'size' => $this->getSize()
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
     * @param int $size
     */
    public function setSize($size)
    {
        if($size > self::MAX_ALLOWED_SIZE) {
            throw new MaxAllowedSearchResultsSizeExceededException($size);
        }
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getIndex(): string
    {
        return $this->index;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }
}
