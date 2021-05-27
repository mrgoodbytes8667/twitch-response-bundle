<?php


namespace Bytes\TwitchResponseBundle\Objects\Games;


use Bytes\TwitchResponseBundle\Objects\Traits\PaginationTrait;

/**
 * Class GamesResponse
 * @package Bytes\TwitchResponseBundle\Objects\Games
 */
class GamesResponse
{
    use PaginationTrait;

    /**
     * @var Game[]|null
     */
    public $data;

    /**
     * @return Game[]|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param Game[]|null $data
     * @return $this
     */
    public function setData(?array $data): self
    {
        $this->data = $data;
        return $this;
    }
}