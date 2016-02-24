<?php

namespace Ulff\ElasticsearchPhpClientBundle\Model;

class DeleteParams
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
     * DeleteParams constructor.
     * @param string $index
     * @param string $type
     * @param string $id
     */
    public function __construct(string $index, string $type, string $id)
    {
        $this->index = $index;
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function toArray(): array
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
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
