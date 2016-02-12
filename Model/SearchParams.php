<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

class SearchParams
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
     * SearchParams constructor.
     * @param string $index
     * @param string $type
     */
    public function __construct(string $index, string $type)
    {
        $this->index = $index;
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'index' => $this->getIndex(),
            'type' => $this->getType(),
            'body' => $this->getBody()
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
}
