<?php


namespace Bytes\TwitchResponseBundle\Objects\Videos;


use Bytes\TwitchResponseBundle\Objects\Traits\PaginationTrait;
use Countable;
use Illuminate\Support\Arr;

/**
 *
 */
class VideosResponse implements Countable
{
    use PaginationTrait;

    /**
     * @var Video[]|null
     */
    public $data;

    /**
     * @return Video[]|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param Video[]|null $data
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
     * @return Video|null
     */
    public function first()
    {
        return reset($this->data);
    }

    /**
     * Sets the internal iterator to the last element in the collection and returns this element.
     *
     * @return Video|null
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
     * @return Video|null
     */
    public function get($key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * Get a random element.
     *
     * @return Video|null
     */
    public function random(): ?Video
    {
        if (empty($this->data)) {
            return null;
        }
        return Arr::random($this->data);
    }
}