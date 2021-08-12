<?php


namespace Bytes\TwitchResponseBundle\Objects\Games;


use Bytes\TwitchResponseBundle\Objects\Traits\PaginationTrait;
use Countable;

/**
 * Class GamesResponse
 * @package Bytes\TwitchResponseBundle\Objects\Games
 */
class GamesResponse implements Countable
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

    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * Sets the internal iterator to the first element in the collection and returns this element.
     *
     * @return Game|null
     */
    public function first()
    {
        return reset($this->data);
    }

    /**
     * Sets the internal iterator to the last element in the collection and returns this element.
     *
     * @return Game|null
     */
    public function last()
    {
        return end($this->data);
    }

    /**
     * Gets the element at the specified key/index.
     *
     * @param string|int $key The key/index of the element to retrieve.
     *
     * @return Game|null
     */
    public function get($key)
    {
        return $this->data[$key] ?? null;
    }
}