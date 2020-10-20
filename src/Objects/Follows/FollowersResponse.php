<?php


namespace Bytes\TwitchResponseBundle\Objects\Follows;


use Bytes\TwitchResponseBundle\Objects\Traits\PaginationTrait;
use Bytes\TwitchResponseBundle\Objects\Traits\TotalTrait;

/**
 * Class FollowersResponse
 * @package Bytes\TwitchResponseBundle\Objects\Follows
 */
class FollowersResponse
{
    use PaginationTrait, TotalTrait;

    /**
     * @var Follow[]|null
     */
    public $data;

    /**
     * @return Follow[]|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param Follow[]|null $data
     * @return $this
     */
    public function setData(?array $data): self
    {
        $this->data = $data;
        return $this;
    }

}