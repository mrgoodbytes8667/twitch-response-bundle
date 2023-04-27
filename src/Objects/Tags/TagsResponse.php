<?php


namespace Bytes\TwitchResponseBundle\Objects\Tags;


use Bytes\TwitchResponseBundle\Objects\Interfaces\DataPaginationResponseInterface;
use Bytes\TwitchResponseBundle\Objects\Traits\PaginationTrait;

/**
 * Class TagsResponse
 * @package Bytes\TwitchResponseBundle\Objects\Streams
 *
 * @link https://dev.twitch.tv/docs/api/reference#get-all-stream-tags
 * @deprecated Twitch no longer has Tag objects
 */
class TagsResponse implements DataPaginationResponseInterface
{
    use PaginationTrait;

    /**
     * @var Tag[]|null
     */
    public $data;

    /**
     * @return Tag[]|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param Tag[]|null $data
     * @return $this
     */
    public function setData(?array $data): self
    {
        $this->data = $data;
        return $this;
    }
}