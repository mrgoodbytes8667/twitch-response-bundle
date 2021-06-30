<?php


namespace Bytes\TwitchResponseBundle\Objects\Streams;


use Bytes\TwitchResponseBundle\Objects\Interfaces\DataPaginationResponseInterface;
use Bytes\TwitchResponseBundle\Objects\Traits\PaginationTrait;

/**
 * Class StreamsResponse
 * @package Bytes\TwitchResponseBundle\Objects\Streams
 */
class StreamsResponse implements DataPaginationResponseInterface
{
    use PaginationTrait;

    /**
     * @var Stream[]|null
     */
    public $data;

    /**
     * @return Stream[]|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param Stream[]|null $data
     * @return $this
     */
    public function setData(?array $data): self
    {
        $this->data = $data;
        return $this;
    }
}